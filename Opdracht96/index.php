<h1>Opdracht 6 hoofdstuk 9: gastenboek</h1>
<form method="post">
    Naam: <input type="text" name="naam" code="naam"></input></br></br>
    Bericht: <textarea type="text" name="bericht" code="bericht"></textarea></br></br>
    <input type="submit" name="knop" code="knop">
</form>


<?php

include "connectpdo.php";

try {
    $stmt = $conn->prepare("INSERT INTO berichten (naam, bericht, datumtijd)
    VALUES (:naam, :bericht, :datumtijd)");
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':bericht', $bericht);
    $stmt->bindParam(':datumtijd', $datumtijd);

    if (isset($_REQUEST['naam']))
    {
        $naam = $_POST['naam'];
        $bericht = $_POST['bericht'];
        $datumtijd = Date('d-m-Y');
        $stmt->execute();

        header('Location: index.php');
    }}
    catch(PDOException $e)
    {
        echo "ERROR: " . $e->getMessage();
    }
    $sqlSelect = "SELECT * from berichten";
    $data = $conn->query($sqlSelect);

    foreach ($data as $row) {
        echo $row['code']." ";
        echo $row['datumtijd']." ";
        echo $row['naam']." ";
        echo $row['bericht']." ";

        echo "<a href='VerwijderBericht.php?code=$row[code]'>Verwijderen</a>";
        echo "</br>";
    }
    $conn = null;

?>