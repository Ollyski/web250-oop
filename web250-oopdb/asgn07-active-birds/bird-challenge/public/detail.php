<?php require_once('../private/initialize.php'); ?>

<?php

// Get requested ID
$id = $_GET['id'] ?? false;

if (!$id) {
  redirect_to('birds.php'); // Redirect to birds inventory if no ID is provided
}

// Find bird using ID
$bird = Bird::find_by_id($id);

if (!$bird) {
  // Redirect if no bird is found
  redirect_to('birds.php');
}

?>

<?php $page_title = 'Detail: ' . h($bird->common_name); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">

  <a href="birds.php">Back to Inventory</a>

  <div id="page">

    <div class="detail">
      <!-- Displaying the bird's details -->
      <dl>
        <dt>Common Name</dt>
        <dd><?php echo h($bird->common_name); ?></dd>
      </dl>
      <dl>
        <dt>Habitat</dt>
        <dd><?php echo h($bird->habitat); ?></dd>
      </dl>
      <dl>
        <dt>Food</dt>
        <dd><?php echo h($bird->food); ?></dd>
      </dl>
      <dl>
        <dt>Nest Placement</dt>
        <dd><?php echo h($bird->nest_placement); ?></dd>
      </dl>
      <dl>
        <dt>Behavior</dt>
        <dd><?php echo h($bird->behavior); ?></dd>
      </dl>
      <dl>
        <dt>Conservation Status</dt>
        <dd><?php echo h($bird->conservation()); ?></dd> <!-- Use the conservation method for human-readable status -->
      </dl>
      <dl>
        <dt>Backyard Tips</dt>
        <dd><?php echo h($bird->backyard_tips); ?></dd>
      </dl>
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>