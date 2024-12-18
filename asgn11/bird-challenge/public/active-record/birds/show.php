<?php require_once('../../../private/initialize.php'); ?>
<?php require_login(); ?>
<?php

$id = $_GET['id'] ?? '1'; // PHP > 7.0

// Fetch bird details by ID
$bird = Bird::find_by_id($id);

?>

<?php $page_title = 'Show Bird: ' . h($bird->common_name); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/active-record/birds/index.php'); ?>">&laquo; Back to List</a>

  <div class="bird show">

    <h1>Bird: <?php echo h($bird->common_name); ?></h1>

    <div class="attributes">
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
        <dt>Backyard_tips</dt>
        <dd><?php echo h($bird->backyard_tips); ?></dd>
      </dl>
      <dl>
        <dt>Conservation Status</dt>
        <!-- Display conservation status based on the conservation_id -->
        <dd>
          <?php
          // Assuming you have a static method or lookup array for conservation statuses
          // Example: 1 = Low concern, 2 = Vulnerable, etc.
          $conservation_status = '';
          switch ($bird->conservation_id) {
            case 1:
              $conservation_status = 'Low concern';
              break;
            case 2:
              $conservation_status = 'Vulnerable';
              break;
            case 3:
              $conservation_status = 'Endangered';
              break;
            case 4:
              $conservation_status = 'Critically Endangered';
              break;
            default:
              $conservation_status = 'Unknown';
              break;
          }
          echo h($conservation_status);
          ?>
        </dd>
      </dl>
      <dl>
        <dt>Backyard Tips</dt>
        <dd><?php echo h($bird->backyard_tips); ?></dd>
      </dl>
    </div>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>