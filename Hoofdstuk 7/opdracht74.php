<form method="post">
<p>Prijs
<input type="text" name="prijs" value=""></p>
<p>Korting
<input type="text" name="korting" value=""> 10</p>
<p><input type="submit" name="verzenden" value="Verzenden"></p>
</form>


<?php



if(isset($_POST['korting'])) {
   $korting = $_POST['korting'];
   $prijs = $_POST['prijs'];
   $som = $prijs - $korting;

if($prijs == "100") {
   echo "Bedrag inclusief 10% korting : $som euro";
}
}


?>