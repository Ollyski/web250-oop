<?php
class Veggies
{
  public $name;
  public $dish;

  public function describe()
  {
    return "This is a {$this->name} used in {$this->dish}.";
  }
}

class Nightshades extends Veggies
{
  public $veggieType;

  // Override the describe method
  public function describe()
  {
    return parent::describe() . " This is a {$this->veggieType} and is part of the nightshade family.";
  }
}

class Cucurbit extends Veggies
{
  public $growingCondition;

  // Override the describe method
  public function describe()
  {
    return parent::describe() . " It needs {$this->growingCondition} to grow well.";
  }
}

$tomato = new Nightshades();
$tomato->name = 'Tomato';
$tomato->dish = 'salad caprese';
$tomato->veggieType = 'fruit'; // Added this line to make the veggieType property meaningful

$eggplant = new Nightshades();
$eggplant->name = 'Eggplant';
$eggplant->dish = 'baba ganoush';
$eggplant->veggieType = 'fruit'; // Added this line to make the veggieType property meaningful

$cucumber = new Cucurbit();
$cucumber->name = 'Cucumber';
$cucumber->dish = 'Cucumber salad';
$cucumber->growingCondition = 'Full sun';

$squash = new Cucurbit();
$squash->name = 'Squash';
$squash->dish = 'Baked squash';
$squash->growingCondition = '6 hours sun';

echo $tomato->describe() . "\n"; // Output: This is a Tomato used in salad caprese. This is a fruit and is part of the nightshade family.
echo $eggplant->describe() . "\n";   // Output: This is a Eggplant used in baba ganoush. This is a fruit and is part of the nightshade family.
echo $cucumber->describe() . "\n"; // Output: This is a Cucumber used in Cucumber salad. It needs Full sun to grow well.
echo $squash->describe() . "\n"; // Output: This is a Squash used in Baked squash. It needs 6 hours sun to grow well.
