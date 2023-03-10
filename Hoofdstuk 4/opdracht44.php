<?php
//groter dan 150 19% duurder
$laptop = 1000;
$som = $laptop * 1.19 ;
$som2 = $laptop * 1.11;

//boven 150 euro 19% erbij
if($laptop > 150) {
    $som = $laptop * 1.19 ;
    echo "Na verhoging van 19% is de prijs $som";
}

elseif($laptop < 55){
    echo "Na verhoging van 11% is de prijs $som2";
}

?>