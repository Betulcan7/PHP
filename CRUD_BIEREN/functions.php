<?php
// functie: algemene functies tbv hergebruik
 function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bieren";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        //echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

 }

 
 // selecteer de data uit de opgeven table
 function GetData($table){
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode query
    // query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }

 // selecteer de rij van de opgeven biercode uit de table bier
 function GetBier($biercode){
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode prepare
    
    $query = $conn->prepare("SELECT * FROM bier WHERE biercode = :biercode");
    $query->execute([':biercode'=>$biercode]);
    $result = $query->fetch();

    return $result;
 }


 function OvzBieren(){

    // Haal alle bier record uit de tabel 
    $result = GetData("bier");
    
    //print table
    PrintTable($result);
    //PrintTableTest($result);
    
 }

 
// Function 'PrintTable' print een HTML-table met data uit $result.
function PrintTable($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function CrudBieren(){

    // Menu-item   insert
    $txt = "
    <h1>Crud BIER</h1>
    <nav>
		<a href='insert_bier.php'>Toevoegen nieuw biertje</a>
    </nav>";
    echo $txt;

    // Haal alle bier record uit de tabel 
    $result = GetData("bier");

    //print table
    PrintCrudBier($result);
    
 }
 // Function 'PrintCrudBier' print een HTML-table met data uit $result 
 // en een wzg- en -verwijder-knop.
function PrintCrudBier($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }
    $table .= "</tr>";

    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
            
        }
        
        // Wijzig knopje
        $table .= "<td>". 
            "<form method='post' action='update_bier.php?biercode=$row[biercode]' >       
                    <button name='wzg'>Wzg</button>	 
            </form>" . "</td>";

        // Delete via linkje href
        $table .= '<td><a href="delete_bier.php?biercode='.$row["biercode"].'">verwijder</a></td>';
        
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}


function UpdateBier($row){
       
    try{
        // Connect database
        $conn = ConnectDb();
        
        // Update data uit de opgegeven table methode prepare
        $sql = "UPDATE bier
        SET 
            naam = '$row[naam]', 
            soort = '$row[soort]', 
            stijl = '$row[stijl]', 
            alcohol = '$row[alcohol]', 
            brouwcode = '$row[brouwcode]' 
        WHERE biercode = $row[biercode]";
        
        $query = $conn->prepare($sql);
        $query->execute();
        
    }

    catch(PDOException $e) {
        echo "Update failed: " . $e->getMessage();
    }
}

function InsertBier($post){
    try {
        $conn = ConnectDb();

        
        $query = $conn->prepare("
        INSERT INTO bier (naam, soort, stijl, alcohol, brouwcode) 
        VALUES (:naam, :soort, :stijl, :alcohol, :brouwcode)");

        //Oplossing 2
        $query->execute(
            [
                ':naam'=>$post['naam'],
                ':soort'=>$post['soort'],
                ':stijl'=>$post['stijl'],
                ':alcohol'=>$post['alcohol'],
                ':brouwcode'=>$post['brouwcode']

            ]
        );
    }

    catch(PDOException $e) {
        echo "Insert failed: " . $e->getMessage();

    }
}

function DeleteBier($biercode){
    echo "Delete row<br>";
    try{
        // Connect database
        $conn = ConnectDb();
        
        // Update data uit de opgegeven table methode prepare
        $sql = "DELETE FROM bier
                WHERE biercode = '$biercode'";
                
        $query = $conn->prepare($sql);
        $result = $query->execute();

    }

    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();

    }
}

function dropDown2($label, $data, $row_selected=-1){
    $text = "<label for='$label'>Choose a $label:</label>
            <select name='$label' id='$label'>";

    foreach($data as $row){
        $text .= "<option value='$row[brouwcode]'>$row[naam]</option>\n";
    }

    $text .= "</select>";

    echo "$text";

}

function dropDownBrouwer($label, $row_selected){
    $data = GetData('brouwer');
    $txt = "
    <label for='$label'>Choose a $label:</label>
        <select name='$label' id='$label'>";

    foreach($data as $row){
        if ($row['brouwcode'] == $row_selected){
            $txt .= "<option value='$row[brouwcode]' selected='selected'>$row[naam]</option>\n";
        } else {
            $txt .= "<option value='$row[brouwcode]'>$row[naam]</option>\n";
        }
        
    }

    $txt .= "</select>";

    echo $txt;
    
}


?>
