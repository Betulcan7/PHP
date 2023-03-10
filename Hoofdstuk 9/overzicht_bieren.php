<?php

try {
    // host, databasenaam, gebruikersnaam, wachtwoord
    $db = new PDO("mysql:host=localhost;dbname=bieren","root","");


    // query selecteer alle bieren
    $query = $db->prepare("SELECT * FROM bier");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);


    echo '<table border="1" width="290">';
    
    foreach ($result as $data) {
        echo "<tr><td>";
        echo $data['naam'] . " " . $data['alcohol'];
        echo "</a>";
        echo "<br>";
        echo "</td></tr>";
    }
    echo "</table>";
}catch(PDOException $e) {
    die("ERROR!: " . $e->message());
}


?>