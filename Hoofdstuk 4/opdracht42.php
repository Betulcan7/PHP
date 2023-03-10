<?php

$day = date("H");
//$day = 13;

switch($day) {
    case $day > 6 && $day < 12 :
        echo "Het is ochtend"; break;

    case $day > 12 && $day < 18 :
        echo "Het is middag"; break;

    case $day > 18 && $day < 24 :
        echo "Het is avond"; break;

    case $day >24 && $day < 6 :
        echo "Het is nacht"; break;
}


?>