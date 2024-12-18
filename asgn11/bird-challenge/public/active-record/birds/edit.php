<?php

require_once('../../../private/initialize.php');
require_login();
// Check if 'id' is set in the URL for the bird being edited
if (!isset($_GET['id'])) {
  redirect_to(url_for('/active-record/birds/index.php'));
}
$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if ($bird == false) {
  redirect_to(url_for('/active-record/birds/index.php'));
}

if (is_post_request()) {

  // Load the existing bird from the database
  $bird = Bird::find_by_id($id);
  if ($bird == false) {
    redirect_to(url_for('/active-record/birds/index.php'));
  }

  // Update attributes with form data
  $args = [];
  $args['common_name'] = $_POST['common_name'] ?? NULL;
  $args['habitat'] = $_POST['habitat'] ?? NULL;
  $args['food'] = $_POST['food'] ?? NULL;
  $args['backyard_tips'] = $_POST['backyard_tips'] ?? NULL;
  $args['conservation_id'] = $_POST['conservation_id'] ?? NULL;


  $bird->merge_attributes($args);
  $result = $bird->update();

  if ($result === true) {
    $_SESSION['message'] = 'The bird was updated successfully.';
    redirect_to(url_for('/active-record/birds/show.php?id=' . h(u($id))));
  } else {
    // $errors will be available for display
    $errors = $bird->errors;
  }
} else {
  $bird = Bird::find_by_id($id);
  if ($bird == false) {
    redirect_to(url_for('/active-record/birds/index.php'));
  }
}
?>
<?php $page_title = 'Edit Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/active-record/birds/index.php'); ?>">&laquo; Back to List</a>

  <div class="bird edit">
    <h1>Edit Bird</h1>

    <!-- Display any errors here (optional, can implement error handling later) -->
    <?php
    $errors = $bird->errors ?? [];
    echo display_errors($bird->errors);
    ?>

    <form action="<?php echo url_for('/active-record/birds/edit.php?id=' . h(u($id))); ?>" method="post">

      <!-- Include the form fields (you'll need to create this for the bird attributes) -->
      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit Bird" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>