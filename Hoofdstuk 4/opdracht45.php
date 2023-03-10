<form action="" method="post">
<input type="number" name="getal" placeholder="Vul een getal in...">
<input type="submit" value="verzenden">
</form>

<?php

if(isset($_POST['getal']))
{
    $getal = $_POST['getal'];
    $modulo = $getal % 2;


if($modulo == 1) {
    echo "Het getal $getal is oneven.";
}
elseif($modulo == 0) {
    echo "Het getal $getal is even.";
}
}

?>