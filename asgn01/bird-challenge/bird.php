<?php

class Bird
{
  // Properties
  public $commonName;
  public $food = "bugs";
  public $nestPlacement = "tree";
  public $conservationLevel;

  // Constructor
  public function __construct($commonName, $food, $nestPlacement, $conservationLevel)
  {
    $this->commonName = $commonName;
    $this->food = $food;
    $this->nestPlacement = $nestPlacement;
    $this->conservationLevel = $conservationLevel;
  }

  public function song(): string
  {
    return "No song defined";
  }

  public function canFly(): string
  {
    return "This bird's flying ability is unknown";
  }

  // Method to display bird details
  public function displayDetails()
  {
    echo "Bird Details<br>";
    echo "Common Name: " . $this->commonName . "<br>";
    echo "Food: " . $this->food . "<br>";
    echo "Nest Placement: " . $this->nestPlacement . "<br>";
    echo "Conservation Level: " . $this->conservationLevel . "<br>";
    echo "Song: " . $this->song() . "<br>";
    echo "Can Fly: " . $this->canFly() . "<br>";
  }
}

// Instantiate a new instance for $bird1
$bird1 = new Bird("Eastern Towhee", "seeds, fruits, insects, spiders", "Ground", "Low");
$bird2 = new Bird("Indigo Bunting", "small seeds, berries, buds, and insects", "roadsides, railroad rights-of-way, fields, and on the edges of woods", "Low");

// Display details for $bird1
$bird1->displayDetails();
$bird2->displayDetails();
