<?php
$broj = isset($_POST['broj']) && $_POST['broj']!='' ? $_POST['broj'] : null;
if(isset($broj)){
    $rand_broj = rand(1, 9);
    if($rand_broj == $broj){
        $color='#38E547';
        $button_val = 'Pogodak!';
    }
    else{
        $button_val='Krivo! Probaj ponovo!';
        $color='#EE392F';
    }
}
else{
    $rand_broj=null;
    $color='#F3F2F1';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vjezba_3_1</title>
    <style>
        .button{
            background-color: <?php echo $color; ?>
        }
    </style>
</head>
<body>
    <form action="" method='post'>
        <label for="broj"><strong>Upiši jedan broj od 1 do 9</strong></label>
        <input type="number" name='broj' id='broj'><br>
        <input type="submit" class='button' value='<?php echo isset($button_val) ? $button_val : 'Pošalji' ;?>'>
    </form>
    <p>
        <?php 
        if(isset($rand_broj)){
            echo "Zamišljeni broj je $rand_broj";
        }
        ?>
    </p>
</body>
</html>