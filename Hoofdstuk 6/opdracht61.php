<?php

// sessie starten
session_start();

// controleren of er al een sessie is
if(isset($_SESSION['teller'])) {

// teller verhogen met 1: ++
$_SESSION['teller']++;
}

else // nieuwe teller starten bij 1
{
    $_SESSION['teller'] = 1;
}

// bericht met het aantal bezoeken
$bericht= "U heeft deze pagina ". $_SESSION['teller']. " keer bekeken.";

echo $bericht;

?>