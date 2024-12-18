<?php require_once('../../private/initialize.php'); ?>

<?php
require_login();
?>
<?php $page_title = 'Member Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <div id="main-menu">
    <h2>Main Menu</h2>
    <ul>
      <li><a href="<?php echo url_for('/active-record/birds/index.php'); ?>">Birds</a></li>
      <li><a href="<?php echo url_for('/active-record/members/index.php'); ?>">Members</a></li>
    </ul>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>