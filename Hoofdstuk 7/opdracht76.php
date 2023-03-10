<?php
    session_start();

    if(empty($_SESSION["cijfer"])) {
       $_SESSION["cijfer"] = array();
    }

    if(isset($_POST["cijfer"])) {
        array_push($_SESSION["cijfer"], $_POST["cijfer"]);
    }

    ?>

    <form action="#" method="post">
        Cijfer <input type="text" name="cijfer" min="0" max="10" value="0" required> <br>
        <input type="submit" value="Toevoegen">
    </form>
    <br><br>

    <?php
        $aantal = sizeof($_SESSION["cijfer"]);
        echo "Aantal ingevoerde cijfers: $aantal";

        $gemiddelde = 0;

        if($aantal > 0) {
            for($i=0;$i<$aantal;$i++) {
                $gemiddelde+= $_SESSION["cijfer"] [$i];

            }
            $gemiddelde = $gemiddelde / $aantal;

        }
        echo "</br>Gemiddelde: ";
        echo round ($gemiddelde,1);

        ?>


