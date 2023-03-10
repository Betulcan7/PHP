<?php

try {
    // host, databasenaam, gebruikersnaam, wachtwoord
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker","root","");


    // query selecteer alle fietsen
    $query = $db->prepare("SELECT * FROM fietsen");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);


    echo "<table>";
    foreach ($result as $data) {
        echo "<a href='Opdracht92.php?id=" . $data['id'] . "'>";
        echo $data['merk'] . " " . $data['type'];
        echo "</a>";
        echo "<br>";
    }
    echo "</table>";
}catch(PDOException $e) {
    die("ERROR!: " . $e->message());
}


?>