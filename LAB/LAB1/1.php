<?php
    $ime = "Stjepko";
    $prezime = "Lončarić";
    $godRodenja = 1999;
    $text = "<p>" . substr($ime, 0, 1) . "." . $prezime;
    $text .= "/";
    $text .= substr($godRodenja, -2, 2);
    $text .= "</p>";

    echo $text;
?>