<?php 
if(isset($_POST['num_a']) && $_POST['num_a'] != '') 
    $a=$_POST['num_a'];
else
    $a=null;
if(isset($_POST['num_b']) && $_POST['num_b'] != '') 
    $b=$_POST['num_b'];
else
    $b=null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vjezba_2_4</title>
</head>
<body>
    <form action="" method='post'>
        <label for="num_a">Vrijednost a:</label>
        <input type="number" name='num_a' id='num_a' value='<?php echo isset($a) ? $a : '' ?>'><br>
        <label for="num_b">Vrijednost b:</label>
        <input type="number" name='num_b' id='num_b' value='<?php echo isset($b) ? $b : '' ?>'><br>
        <input type="submit" value='Pošalji'>
    </form>  
    <p>
    <?php
        if (isset($a) && isset($b)){
            $c = (3*$a - $b) / 2;
            echo '(3*'.$a.' - '.$b.') / 2 = '.$c;
            print $c;
        }
    ?>
    </p>  
</body>
</html>