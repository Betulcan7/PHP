<?php

// functie: Programma overzicht bieren 




include 'functionsb.php';

$conn = ConnectDb();
var_dump($conn);

OvzBieren($conn);
 

?>