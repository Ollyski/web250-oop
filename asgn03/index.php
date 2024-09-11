<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asgn03 Inheritance</title>
</head>

<body>
    <h1>Inheritance Examples</h1>
    <?php
    include 'Bird.php';

    echo "<p>Bird instances before creation: " . Bird::$instanceCount . "</p>";
    echo "<p>Yellow-bellied Flycatcher instances before creation: " . YellowBelliedFlyCatcher::$instanceCount . "</p>";
    echo "<p>Kiwi instances before creation: " . Kiwi::$instanceCount . "</p>";

    $bird = Bird::create();
    echo '<p>The generic song of any bird is "' . $bird->song . '".</p>';

    $flyCatcher = YellowBelliedFlyCatcher::create();
    echo '<p>The song of the ' . $flyCatcher->name . ' on breeding grounds is "' . $flyCatcher->song . '".</p>';

    $kiwi = Kiwi::create();
    $kiwi->flying = "no";
    echo "<p>The " . $flyCatcher->name . " " . $flyCatcher->canFly() . ".</p>";
    echo "<p>The " . $kiwi->name . " " . $kiwi->canFly() . ".</p>";

    echo "<p>Bird instances after creation: " . Bird::$instanceCount . "</p>";
    echo "<p>Yellow-bellied Flycatcher instances after creation: " . YellowBelliedFlyCatcher::$instanceCount . "</p>";
    echo "<p>Kiwi instances after creation: " . Kiwi::$instanceCount . "</p>";
    ?>
</body>

</html>