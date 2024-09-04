<?php
class Veggies
{
  private $name;
  private $dish;

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getDish()
  {
    return $this->dish;
  }

  public function setDish($dish)
  {
    $this->dish = $dish;
  }

  public function describe()
  {
    return "This is a {$this->name} used in {$this->dish}.";
  }
}

class Nightshades extends Veggies
{
  protected $veggieType;

  public function getVeggieType()
  {
    return $this->veggieType;
  }

  public function setVeggieType($veggieType)
  {
    $this->veggieType = $veggieType;
  }

  public function describe()
  {
    return parent::describe() . " This is a {$this->veggieType} and is part of the nightshade family.";
  }
}

class Cucurbit extends Veggies
{
  protected $growingCondition;

  public function getGrowingCondition()
  {
    return $this->growingCondition;
  }

  public function setGrowingCondition($growingCondition)
  {
    $this->growingCondition = $growingCondition;
  }

  public function describe()
  {
    return parent::describe() . " It needs {$this->growingCondition} to grow well.";
  }
}

$tomato = new Nightshades();
$tomato->setName('Tomato');
$tomato->setDish('salad caprese');
$tomato->setVeggieType('fruit');

$eggplant = new Nightshades();
$eggplant->setName('Eggplant');
$eggplant->setDish('baba ganoush');
$eggplant->setVeggieType('fruit');

$cucumber = new Cucurbit();
$cucumber->setName('Cucumber');
$cucumber->setDish('Cucumber salad');
$cucumber->setGrowingCondition('Full sun');

$squash = new Cucurbit();
$squash->setName('Squash');
$squash->setDish('Baked squash');
$squash->setGrowingCondition('6 hours sun');

echo $tomato->describe() . "\n"; // Output: This is a Tomato used in salad caprese. This is a fruit and is part of the nightshade family.
echo $eggplant->describe() . "\n";   // Output: This is a Eggplant used in baba ganoush. This is a fruit and is part of the nightshade family.
echo $cucumber->describe() . "\n"; // Output: This is a Cucumber used in Cucumber salad. It needs Full sun to grow well.
echo $squash->describe() . "\n"; // Output: This is a Squash used in Baked squash. It needs 6 hours sun to grow well.
