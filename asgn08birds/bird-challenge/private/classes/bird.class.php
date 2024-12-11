<?php

class Bird
{
  // ----- START OF ACTIVE RECORD CODE ------
  static protected $database;
  static protected $db_columns = ['id', 'common_name', 'habitat', 'food', 'conservation_id', 'backyard_tips'];

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

    // results into objects
    $object_array = [];
    while ($record = $result->fetch_assoc()) {
      $object_array[] = self::instantiate($record);
    }

    $result->free();

    return $object_array;
  }

  static public function find_all()
  {
    $sql = "SELECT * FROM birds";
    return self::find_by_sql($sql);
  }

  static public function find_by_id($id)
  {
    $sql = "SELECT * FROM birds ";
    $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
    $obj_array = self::find_by_sql($sql);
    if (!empty($obj_array)) {
      return array_shift($obj_array);
    } else {
      return false;
    }
  }

  static protected function instantiate($record)
  {
    $object = new self;
    // Could manually assign values to properties
    // but automatic assignment is easier and re-usable
    foreach ($record as $property => $value) {
      if (property_exists($object, $property)) {
        $object->$property = $value;
      }
    }
    return $object;
  }

  public function create()
  {
    $attributes = $this->sanitized_attributes();
    $sql = "INSERT INTO birds (";
    $sql .= join(', ', array_keys($attributes));
    $sql .= ") VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    $result = self::$database->query($sql);
    if ($result) {
      $this->id = self::$database->insert_id;
      return true;
    } else {
      echo "Error in query: " . self::$database->error;  // Add this for debugging
      return false;
    }
    return $result;
  }

  // Properties which have DB columns, excluding ID
  public function attributes()
  {
    $attributes = [];
    foreach (self::$db_columns as $column) {
      if ($column == 'id') {
        continue;
      }
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }

  protected function sanitized_attributes()
  {
    $sanitized = [];
    foreach ($this->attributes() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $sanitized;
  }

  // ----- END OF ACTIVE RECORD CODE ------

  // Public properties (attributes) for the Bird class
  public $id;
  public $common_name;
  public $habitat;
  public $food;
  public $behavior;
  public $conservation_id;
  public $backyard_tips;

  // Constants for the bird's conservation status
  public const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  ];

  // Constructor method for setting initial values
  public function __construct($args = [])
  {
    $this->common_name = $args['common_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->behavior = $args['behavior'] ?? '';
    $this->conservation_id = $args['conservation_id'] ?? 1; // Default to 1 (Low concern)
    $this->backyard_tips = $args['backyard_tips'] ?? '';
  }

  // Method to get conservation status based on conservation_id
  public function conservation()
  {
    if ($this->conservation_id > 0) {
      return self::CONSERVATION_OPTIONS[$this->conservation_id] ?? 'Unknown status';
    } else {
      return 'Unknown status';
    }
  }

  // Additional helper methods can be added as needed, such as validation, etc.
}
