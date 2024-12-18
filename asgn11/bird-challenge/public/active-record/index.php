<?php require_once('../../private/initialize.php'); ?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../private/initialize.php');
include(SHARED_PATH . '/public_header.php');
require_once __DIR__ . '/../private/status_error_functions.php';
?>

<ul>
  <li><a href="<?php echo url_for('/birds.php'); ?>">View Our List of WNC Birds</a></li>
  <li><a href="<?php echo url_for('/about.php'); ?>">About Us</a></li>
  <li><a href="<?php echo url_for('/active-record/login.php'); ?>">Login</a></li>
  <li><a href="<?php echo url_for('/active-record/signup.php'); ?>">Signup</a></li>
</ul>

<?php include(SHARED_PATH . '/public_footer.php'); ?>