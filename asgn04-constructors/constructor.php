<?php

class Bird
{
  public $commonName;
  public $latinName;

  public function __construct($commonName, $latinName)
  {
    $this->commonName = $commonName;
    $this->latinName = $latinName;
  }
}


$bird1 = new Bird('Robin', 'Turdus migratorius');
$bird2 = new Bird('Eastern Towhee', 'Pipilo erythrophthalmus');

echo 'Bird 1<br />';
echo '- Common Name: ' . $bird1->commonName . '<br />';
echo '- Latin Name: ' . $bird1->latinName . '<br />';
echo '<br />';

echo 'Bird 2<br />';
echo '- Common Name: ' . $bird2->commonName . '<br />';
echo '- Latin Name: ' . $bird2->latinName . '<br />';
