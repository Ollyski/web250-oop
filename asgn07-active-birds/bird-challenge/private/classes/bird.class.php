<?php

class Bird
{
  // ----- START OF ACTIVE RECORD CODE
  static protected $database;

  static public function set_database($database)
  {
    self::$database = $database;
  }
  static public function find_by_sql($sql)
  {
    $result = self::$database->query($sql);
    if (!$result) {
      exit("Database query failed.");
    }
    //results into objects
    $object_array = [];
    while ($record = $result->fetch_assoc()) {
      $object_array[] = self::instantiate($record);
    }
    $result->free();
    return $object_array;
  }
  static public function find_all()
  {
    // SQL query to select all birds from the birds table
    $sql = "SELECT * FROM birds";
    return self::find_by_sql($sql);
  }

  static public function find_by_id($id)
  {
    // Fixed: added a space between FROM birds and WHERE
    $sql = "SELECT * FROM birds WHERE id='" . self::$database->escape_string($id) . "'";

    // Execute the query and fetch the result
    $obj_array = self::find_by_sql($sql);

    if (!empty($obj_array)) {
      return array_shift($obj_array);  // Return the first (and only) result
    } else {
      return false;  // No bird found with the given ID
    }
  }
  static protected function instantiate($record)
  {
    $object = new self;
    // could manually assign values to properties
    //automatic is easier and re-useable
    foreach ($record as $property => $value) {
      if (property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }
  // ----- END OF ACTIVE RECORD CODE
  // Public properties based on the CSV fields
  public $id;
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
