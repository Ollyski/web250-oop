<?php
global $session;
if (!isset($page_title)) {
  $page_title = 'Staff Area';
}
?>

<!doctype html>

<html lang="en">

<head>
  <title>WNC BIRDS - <?php echo h($page_title); ?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" />
</head>

<body>
  <navigation>
    <h1>
      <a href="<?php echo url_for('/index.php'); ?>">
        WNC Birds
      </a>
    </h1>
    <ul>
      <?php if ($session->is_logged_in()) { ?>
        <li>User: <?php echo $session->username; ?></li>
        <li><a href="<?php echo url_for('/active-record/logout.php'); ?>">Logout</a></li>
      <?php } ?>
    </ul>
  </navigation>

 