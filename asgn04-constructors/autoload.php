<?php

function my_autoload($class)
{
  $classLower = strtolower($class);
  if (preg_match('/\A\w+\Z/', $classLower)) {
    include 'classes/' . $classLower . '.class.php';
  }
}

spl_autoload_register('my_autoload');

$bird1 = new bird(['commonName' => 'Acadian Flycatcher', 'latinName' => 'Empidonax virescens']);
