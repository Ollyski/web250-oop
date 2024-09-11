<?php

class Bird
{
    public $habitat;
    public $food;
    public $nesting = "tree";
    public $conservation;
    public $song = "chirp";
    public $flying = "yes";

    public static $instanceCount = 0;
    protected static $eggNum = 0;

    public function canFly()
    {
        return $this->flying == "yes" ? "bird can fly" : "cannot fly and is stuck on the ground";
    }

    public static function create()
    {
        self::$instanceCount++;
        return new self();
    }
}

class YellowBelliedFlyCatcher extends Bird
{
    public $name = "yellow-bellied flycatcher";
    public $diet = "mostly insects.";
    public $song = "flat chilk";

    protected static $eggNum = "3-4, sometimes 5";
}

class Kiwi extends Bird
{
    public $name = "kiwi";
    public $diet = "omnivorous";
    public $flying = "no";
}
