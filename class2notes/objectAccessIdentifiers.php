<?php

// Base class representing an Employee
class Employee
{
  // Public properties can be accessed directly
  public $name;
  public $id;

  // Protected property can be accessed within this class and derived classes
  protected $salary;

  // Private property can only be accessed within this class
  private $hireDate;

  // Public method to get the salary (demonstrating encapsulation)
  public function getSalary()
  {
    return $this->salary;
  }

  // Public method to set the salary (demonstrating encapsulation)
  public function setSalary($salary)
  {
    $this->salary = $salary;
  }
  //Setters and Getters
  // Public method to set the hire date (demonstrating encapsulation)
  public function setHireDate($hireDate)
  {
    $this->hireDate = $hireDate;
  }

  //Setters and Getters
  // Public method to get the hire date (demonstrating encapsulation)
  public function getHireDate()
  {
    return $this->hireDate;
  }

  // Public method to display employee details
  public function displayInfo()
  {
    echo "Name: {$this->name}<br>";
    echo "ID: {$this->id}<br>";
    echo "Salary: {$this->getSalary()}<br>";
    echo "Hire Date: {$this->getHireDate()}<br>";
  }
}

// Derived class representing a Manager
class Manager extends Employee
{
  // Public property specific to Manager
  public $department;

  // Public method specific to Manager
  public function displayManagerInfo()
  {
    // Call the parent method to display common information
    parent::displayInfo();
    echo "Department: {$this->department}<br>";
  }
}

// Derived class representing a Developer
class Developer extends Employee
{
  // Public property specific to Developer
  public $programmingLanguage;

  // Public method specific to Developer
  public function displayDeveloperInfo()
  {
    // Call the parent method to display common information
    parent::displayInfo();
    echo "Programming Language: {$this->programmingLanguage}<br>";
  }
}

// Example usage
$manager = new Manager();
$manager->name = 'Alice Johnson';
$manager->id = 'M001';
$manager->setSalary(80000);
$manager->setHireDate('2022-01-15'); // Using method to set private property
$manager->department = 'HR';

$developer = new Developer();
$developer->name = 'Bob Smith';
$developer->id = 'D001';
$developer->setSalary(70000);
$developer->setHireDate('2023-03-22'); // Using method to set private property
$developer->programmingLanguage = 'PHP';

echo "Manager Info:\n";
$manager->displayManagerInfo(); // Display Manager's info

echo "\nDeveloper Info:\n";
$developer->displayDeveloperInfo(); // Display Developer's info
