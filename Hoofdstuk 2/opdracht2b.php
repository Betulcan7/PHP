<?php


//a
$dag = date("J F Y"); 
echo "Het is vandaag: $dag";

//b
$b = "Vandaag is het de 75e dag van het jaar.";
echo "$b";

//c
echo "is de 3e dag van de week" . date("l") ;

//d
$month = date("F");
$daysInMonth = date("T");
echo "De maand $month heeft $daysInMonth dagen";

//e
$jaar = date ("Y");
$getal = "2022";

if($jaar >= $getal);
{
    echo "Het $jaar is een schrikeljaar.";
}
?>