<?php
    $ocjena_predmet1 = "2";
    $ocjena_predmet2 = "5";
    $ocjena_predmet3 = "4";
    $ocjena_predmet4 = "4";
    $prosjek = $ocjena_predmet1 + $ocjena_predmet2 + $ocjena_predmet3 + $ocjena_predmet4;
    $prosjek /= 4;
    $text = "<p>Vaš prosjek je $prosjek";

    if ($prosjek < 1.5){
        $text .= " (nedovoljan)";
    }
    elseif ($prosjek < 2.5 && $prosjek > 1.5){
        $text .= " (dovoljan)";
    }
    elseif ($prosjek < 3.5 && $prosjek > 2.5){
        $text .= " (dobar)";
    }
    elseif ($prosjek < 4.5 && $prosjek > 3.5){
        $text .= " (vrlo dobar)";
    }
    elseif ($prosjek > 4.5) {
        $text .= " (odličan)";
    }

    $text .= "</p>";

    echo $text;
?>