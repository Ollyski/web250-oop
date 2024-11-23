<?php
require_once('../private/initialize.php');
$page_title = 'Sightings';
include(SHARED_PATH . '/public_header.php');
?>

<h2>Bird inventory</h2>
<p>This is a short list -- start your birding!</p>

<table id="bird" border="1">
  <tr>
    <th>Common Name</th>
    <th>Habitat</th>
    <th>Food</th>
    <th>Nest Placement</th>
    <th>Behavior</th>
    <th>Conservation Status</th>
    <th>Backyard Tips</th>
  </tr>
  <?php
  $parser = new ParseCSV(PRIVATE_PATH . '/wnc-birds.csv');
  $bird_array = $parser->parse();
  foreach ($bird_array as $args) {
    $bird = new Bird($args);

  ?>
    <tr>
      <td><?php echo h($bird->common_name); ?></td>
      <td><?php echo h($bird->habitat); ?></td>
      <td><?php echo h($bird->food); ?></td>
      <td><?php echo h($bird->nest_placement); ?></td>
      <td><?php echo h($bird->behavior); ?></td>
      <td><?php echo h($bird->conservation_id); ?></td>
      <td><?php echo h($bird->backyard_tips); ?></td>
    </tr>
  <?php
  }
  ?>
</table>


<?php include(SHARED_PATH . '/public_footer.php'); ?>