<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if (is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if (is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // If there were no errors, try to log in
  if (empty($errors)) {
    $member = Member::find_by_username($username);
    if ($member != false && $member->verify_password($password))
      //mark admin as logged in
      $session->login($member);
    redirect_to(url_for('/active-record/index.php'));
  } else {
    $errors[] = "Log in unsuccessful";
  }
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Submit" />
  </form>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>