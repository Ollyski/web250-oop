<?php

require_once('../../../private/initialize.php');

// Check if the 'id' is set in the GET request (for deleting a bird)
if (!isset($_GET['id'])) {
  redirect_to(url_for('/active-record/birds/index.php'));  // Redirect to bird list page if no ID is provided
}
$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if ($bird == false) {
  redirect_to(url_for('/active-record/birds/index.php'));
}

// If the form is submitted (POST request), delete the bird
if (is_post_request()) {

  $result = $bird->delete();
  $_SESSION['message'] = 'The bird was deleted successfully.';
  redirect_to(url_for('/active-record/birds/index.php'));  // Redirect back to the birds list page after deletion
} else {
  // Display the confirmation form (GET request)
  $bird = Bird::find_by_id($id);  // Fetch bird details to show in the confirmation form
  if (!$bird) {
    $_SESSION['message'] = 'Bird not found.';
    redirect_to(url_for('/active-record/birds/index.php'));
  }
}

?>

<?php $page_title = 'Delete Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/active-record/birds/index.php'); ?>">&laquo; Back to List</a>

  <div class="bird delete">
    <h1>Delete Bird</h1>
    <p>Are you sure you want to delete this bird?</p>
    <p class="item"><?php echo h($bird->name()); ?></p> <!-- Display the bird's common name -->

    <form action="<?php echo url_for('/active-record/birds/delete.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Bird" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>