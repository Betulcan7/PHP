<?php

function omtrek() {
    $pi = (pi());
    // Het veld lengte uitlezen en de waarde in de variabele zetten.
    $lengte = $_POST['lengte'];
    $diameter = $lengte * 2;
    $som = $diameter * $pi;

    // number_format maakt er 1 decimaal van.
    $antwoord = number_format($som, 1);
    echo "De omtrek van een cirkel met straal $lengte is : $antwoord</br>";
}

function Oppervlakte() {
    $pi = (pi());
    $lengte = $_POST['lengte'];
    $som = $lengte * $lengte * $pi;
    $antwoord = number_format($som, 1);
    echo "De oppervlakte van een cirkel met straal $lengte is : $antwoord</br>";
}

// controleren met isset of er gekozen is voor een knop
if(isset($_POST['omtrek'])) {
    omtrek();
}
if(isset($_POST['oppervlakte'])) {
    Oppervlakte();
}


?>




<form method="post">
<input type="number" name="lengte" placeholder="Geef lengte van de cirkel" required/>
<input type="submit" name="omtrek" value="omtrek"/>
<input type="submit" name="oppervlakte" value="oppervlakte"/>
</form>