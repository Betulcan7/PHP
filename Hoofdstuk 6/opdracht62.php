<?php

// als er cookie teller bestaat, ophogen met 1
    if(isset($_COOKIE['teller'])) {
        setcookie("teller", intval($_COOKIE['teller']) + 1);
    }
    else {
        // nieuwe cookie maken
        setcookie("teller", 1);
    }

    if(isset($_COOKIE['teller'])) {
    echo "In totaal heb je deze pagina al: ".$_COOKIE['teller'].
    " keer bekeken.";
    }



?>