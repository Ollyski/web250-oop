<?php

class Bird
{
  public $commonName;
  public $latinName;

  public function __construct(array $args)
  {
    $this->commonName = $args['commonName'] ?? 'Unknown Common Name';
    $this->latinName = $args['latinName'] ?? 'Unknown Latin Name';
  }
}

$bird1 = new Bird(['commonName' => 'Acadian Flycatcher', 'latinName' => 'Empidonax virescens']);
$bird2 = new Bird(['commonName' => 'Eastern Towhee', 'latinName' => 'Pipilo erythrophthalmus']);

echo 'Bird 1<br />';
echo '- Common Name: ' . $bird1->commonName . '<br />';
echo '- Latin Name: ' . $bird1->latinName . '<br />';
echo '<br />';

echo 'Bird 2<br />';
echo '- Common Name: ' . $bird2->commonName . '<br />';
echo '- Latin Name: ' . $bird2->latinName . '<br />';
