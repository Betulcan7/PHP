<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker", "root");
    if(isset($_POST['inloggen'])){
    $username = filter_input(INPUT_POST, "username");
    $password = sha1($_POST['password']);
    $query = $db->prepare("SELECT * FROM gebruikers WHERE username = :user AND password = :pass");
    $query->bindParam("user", $username);
    $query->bindParam("pass", $password);
    $query->execute();
    session_start();

    if($query->rowCount() == 1){
        echo "Juiste gegevens!";
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['login'] = True;
        header('location: Beveiligdepagina.php');
    } else {
        $_SESSION['username'] = "";
        $_SESSION['password'] = "";
        $_SESSION['login'] = FALSE;
        echo "Onjuste gegevens!";
    }
    echo "<br>";
    }
} catch(PDOException $e) {
    die("Error!: " . $e->getMessage());
}

?>

<form method="post" action="">
    <label>Username</label>
    <input type="text" name="username"><br>
    <label>Password</label>
    <input type="password" name="password"><br>
    <input type="submit" name="inloggen" value="Inloggen">
</form>