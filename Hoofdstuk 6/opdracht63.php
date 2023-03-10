<?php

function WillekeurigePostcode()
{
// 4 willekeurige cijfers
echo rand(1000,9999);

// het alfabet
$stringtekst = "ABCDEFGIJKLMNOPQRSTUVWXYZ";

// 2 willekeurige tekens (str_shuffle) van de stringtekst (substr)
$random = substr(str_shuffle($stringtekst), 0, 2);

// toon de tekens
echo $random;

}

WillekeurigePostcode();


?>