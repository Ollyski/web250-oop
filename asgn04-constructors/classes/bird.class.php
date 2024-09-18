<?php

class Bird
{
  public $commonName;
  public $latinName;
  public function __construct($args = [])
  {
    $this->commonName = $args['commonName'] ?? NULL;
    $this->latinName = $args['latinName'] ?? NULL;
  }
}

$bird1 = new bird(['commonName' => 'Acadian Flycatcher', 'latinName' => 'Empidonax virescens']);
$bird2 = new bird(['commonName' => 'Eastern Towhee', 'latinName' => 'Pipilo erythrophthalmus']);

echo 'bird 1<br />';
echo '- Common Name: ' . $bird1->commonName . '<br />';
echo '- Latin Name: ' . $bird1->latinName . '<br />';
echo '<br />';

echo 'bird 2<br />';
echo '- Common Name: ' . $bird2->commonName . '<br />';
echo '- Latin Name: ' . $bird2->latinName . '<br />';
