<?
  //Base Class

  class CarpentryTool {
    public $name;
    public $purpose;
  }

  //Method to describe the tool
  public function describe() {
    return "This is a {$this->name} used for {$this->purpose}.";
  }

  //Derived class for Hand Tools
  class HandTool extends CarpentryTool {
    public $toolType;

    //Ovveride the describe method
    public function describe() {
      return parent::describe() . " It is a {"
    }
  }

  //Derived class for Power Tools
  class PowerTool extends CarpentryTool {
    public $powerSource;

    //Ovveride the describe method
    public function ()
  }