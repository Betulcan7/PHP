<?php

function ConnectDb(){
    echo "connect<br>";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bieren";

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    }
    
    function OvzBieren($conn){
      $query = $conn->prepare("SELECT * FROM bier");
      $query->execute();
      $result = $query->fetchAll(PDO:FETCH_ASSOC);
    
      var_dump($result);
    }


    function CrudBieren(){    

      // Haal alle bier record uit de tabel    
      $result = GetData("bier");      
      
      //print table   
      PrintCrudBier($result);   
      //PrintTableTest($result);   
  
  }
  
  function PrintCrudBieren(){
  
  }

?>