<?php
function je_prost($num){
    if($num <= 1){
        return false;
    }
    for($i = 2; $i < sqrt($num); $i++){
        if($num % $i == 0){
            return false;
        }
    }
    return true;
}

for($i = 0; $i < 100; $i++){
    if(je_prost($i)){
        echo $i." ";
    }
}
?>