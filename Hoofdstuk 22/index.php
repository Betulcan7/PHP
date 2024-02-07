<?php

declare(strict_types=1);

require_once 'Music.php';
require_once 'ListenList.php';

$kees = new ListenList();
$music1 = new Music (name: "Bach", genre: 'Klassiek', listen: 3);
$music2 =  new Music (name: "ABC", genre: "House", listen: 2);

$kees->addMusic($music1);
$kees->addMusic($music2);
$kees->addMusic($music1);

echo $music1->getname();

var_dump($kees);

?>