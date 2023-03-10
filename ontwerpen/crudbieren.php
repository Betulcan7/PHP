
<?php

try {
    // host, databasenaam, gebruikersnaam, wachtwoord
    $db = new PDO("mysql:host=localhost;dbname=bieren","root","");


    // query selecteer alle bieren
    $query = $db->prepare("SELECT * FROM bier");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);


  
    echo '<a href="toevoegen.php">Toevoegen nieuwe regisseur</a>'; 

    echo '<table border="1" width="290">';
    
    foreach ($result as $data) {
        echo "<tr>";
        echo "<td>" . $data ["naam"].  "</td>";
        echo "<td>" . $data ["soort"].  "</td>";
        echo "<td>" . $data ["stijl"].  "</td>";
        echo "<td>" . $data ["alcohol"].  "</td>";
        echo "<td>" . $data ["biercode"].  "</td>";
        echo "<td>" . $data ["brouwcode"].  "</td>";
        echo "<td><input type='button' value=wijzig </td>";
        echo "<td><input type='button' value=verwijder </td>";
        echo "<td>  </td>";
        
        echo "</tr>";
    }
    echo "</table>";
}catch(PDOException $e) {
    die("ERROR!: " . $e->message());
}


?>
