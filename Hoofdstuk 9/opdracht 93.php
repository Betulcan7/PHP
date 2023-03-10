<?php

try {
    // host, databasenaam, gebruikersnaam, wachtwoord
    $db = new PDO("mysql:host=localhost;dbname=cijfers","root","");


    // query selecteer alle fietsen
    $query = $db->prepare("SELECT * FROM cijfers");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);


    echo '<table border="1" width="200">';
    foreach ($result as $data) {
        
        echo "<tr><td>";
        echo $data['leerling'] . " " . $data['cijfer'];
        echo "</td></tr>";
        echo "</a>";
        echo "<br>";
    }
    echo "</table>";
}catch(PDOException $e) {
    die("ERROR!: " . $e->message());
}

?>