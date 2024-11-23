<?php

class Bird
{
  // Public properties based on the CSV fields
  public $common_name;
  public $habitat;
  public $food;
  public $nest_placement;
  public $behavior;
  public $conservation_id;
  public $backyard_tips;

  // Protected constant for conservation status options
  protected const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  ];

  // Constructor accepting an associative array of bird data
  public function __construct($args = [])
  {
    $this->common_name = $args['common_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->nest_placement = $args['nest_placement'] ?? '';
    $this->behavior = $args['behavior'] ?? '';
    $this->conservation_id = $args['conservation_id'] ?? 1; // Default to 1 (Low concern)
    $this->backyard_tips = $args['backyard_tips'] ?? '';
  }

  // Method to return the conservation status based on the conservation_id
  public function conservation()
  {
    // Check if the conservation_id exists in the CONSERVATION_OPTIONS array
    return self::CONSERVATION_OPTIONS[$this->conservation_id] ?? 'Unknown status';
  }
}
