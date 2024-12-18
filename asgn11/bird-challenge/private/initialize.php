<?php
define('PRIVATE_PATH', __DIR__);
require_once PRIVATE_PATH . '/classes/bird.class.php';
ob_start(); // turn on output buffering
require_once('status_error_functions.php');
require_once('classes/databaseobject.class.php');
require_once('db_credentials.php');
require_once('classes/member.class.php');
require_once('classes/session.class.php');
Member::set_database($connection);
$session = new Session();

// Assign file paths to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

// Assign the root URL to a PHP constant
// * Do not need to include the domain
// * Use same document root as webserver
// * Can set a hardcoded value:
// define("WWW_ROOT", '/~kevinskoglund/chain_gang/public');
// define("WWW_ROOT", '');
// * Can dynamically find everything in URL up to "/public"
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once('functions.php');
require_once('db_credentials.php');
require_once('database_functions.php');
require_once('validation_functions.php');

// Load class definitions manually

// -> Individually
// require_once('classes/bicycle.class.php');

// -> All classes in directory
foreach (glob('classes/*.class.php') as $file) {
  require_once($file);
}

// Autoload class definitions
function my_autoload($class)
{
  if (preg_match('/\A\w+\Z/', $class)) {
    include('classes/' . $class . '.class.php');
  }
}
spl_autoload_register('my_autoload');

$database = db_connect();
Bird::set_database($database);
// Handle the login logic
if (is_post_request()) {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  $errors = [];
  if (is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if (is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  //if (empty($errors)) {
  if ($username === 'guest' && $password === 'password123') {
    // If it's the default user, log them in directly
    $guest_member = new Member();
    $guest_member->username = 'guest';
    $guest_member->password = 'password123'; // This is a placeholder; you should check against a hashed password in production
    $guest_member->first_name = 'Guest';
    $guest_member->last_name = 'User';
    $session->login($guest_member);
    redirect_to(url_for('/active-record/index.php'));
  } else {
    // Otherwise, find the member in the database
    $member = Member::find_by_username($username);
    if ($member != false && $member->verify_password($password)) {
      // Mark the member as logged in
      $session->login($member);
      redirect_to(url_for('/active-record/index.php'));
    } else {
      $errors[] = "Log in unsuccessful";
    }
  }
}
