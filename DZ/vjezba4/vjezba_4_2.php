<?php
function ducan($stanje='otvoren'){
    if(date('l')=='Sunday'){
        $stanje='zatvoren';
    }elseif ((date('H') < 9 || date('H') > 14) && date('l')=='Saturday') {
        $stanje='zatvoren';
    }elseif ((date('H') < 8 || date('H') > 20)){
        $stanje='zatvoren';
    }
    echo 'Sada je '.date('H:i:s').'. Ducan je '.$stanje;
}
ducan();
?>
