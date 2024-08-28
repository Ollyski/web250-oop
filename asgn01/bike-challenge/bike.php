<?php

/*no closing php tag when just starting */

class Bike
{
  //Properties -- describe something in a class
  var $brand;
  var $model;
  var $year;
  var $description;
  var $weight;
  //Constructor

  public function __construct($brand, $model, $year, $description, $weight)
  {
    $this->brand = $brand;
    $this->model = $model;
    $this->year = $year;
    $this->description = $description;
    $this->weight = $weight;
  }

  //Method (same as functions but with some special properties)

  public function displayDetails()
  {
    echo "Bike Details<br>";
    echo "Brand: " . $this->brand . "<br>";
    echo "Model: " . $this->model . "<br>";
    echo "Year: " . $this->year . "<br>";
    echo "Description: " . $this->description . "<br>";
    echo "Weight: " . $this->weight . "<br>";
  }
}

//Instantiate a new instance
// Create an object

$bike = new Bike("Mongoose", "Shredder", "2010", "A sturdy blue mountain bike", "10kg");
$bike->displayDetails();

$bike2 = new Bike("Griffin", "Rover", "2020", "A hybrid commuter and mountain bike", "7kg");
$bike2->displayDetails();
