<?php


class Acteur{

	// Methods
	public function getActeurs() {
		include 'conn.php';
		$conn = dbConnect();
		
		/*$acteurs = $conn->prepare("select * from 	acteurs");
		$acteurs->execute();
		$lijst = $acteurs->fetchAll(); */
		
		// query: is een prepare en execute in 1 zonder placeholders
		$lijst = $conn->query("select * from 	acteurs")->fetchAll();
		
		return $lijst;
	}


	public function showTable($lijst){
		echo "<table border=1px>";
				foreach($lijst as $row)
				{
					echo "<tr>";
					echo "<td>" . $row["NR"] . "</td>";
					echo "<td>" . $row["VOORNAAM"] . "</td>";
					echo "<td>" . $row["ACHTERNAAM"] . "</td>";
					echo "</tr>";
				}
			echo "</table>";
	}
}
?>