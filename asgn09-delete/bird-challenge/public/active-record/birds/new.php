<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {

  // Create record using post parameters
  $args = [];
  $args['common_name'] = $_POST['common_name'] ?? NULL;
  $args['scientific_name'] = $_POST['scientific_name'] ?? NULL;
  $args['habitat'] = $_POST['habitat'] ?? NULL;
  $args['food'] = $_POST['food'] ?? NULL;
  $args['nest_placement'] = $_POST['nest_placement'] ?? NULL;
  $args['backyard_tips'] = $_POST['backyard_tips'] ?? NULL;
  $args['conservation_status'] = $_POST['conservation_status'] ?? NULL;
  $args['description'] = $_POST['description'] ?? NULL;

  $bird = new Bird($args);
  $result = $bird->create();

  if ($result === true) {
    $new_id = $bird->id;
    $_SESSION['message'] = 'The bird was created successfully.';
    redirect_to(url_for('/active-record/birds/show.php?id=' . $new_id));
  } else {
    // show errors
  }
} else {
  // display the form
  $bird = new Bird;
}

?>

<?php $page_title = 'Create Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/active-record/birds/index.php'); ?>">&laquo; Back to List</a>

  <div class="bird new">
    <h1>Create Bird</h1>

    <?php echo display_errors($bird->errors);
    ?>

    <form action="<?php echo url_for('/active-record/birds/new.php'); ?>" method="post">

      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Bird" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>