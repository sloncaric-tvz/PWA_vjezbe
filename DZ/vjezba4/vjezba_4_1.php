<?php
$vozila = array('Audi', 'BMW', 'Citroen', 'Renault');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vjezba_4_1</title>
    <style>
        input[type='submit']{
            margin:10px;
        }
    </style>
</head>
<body>
    <form action="" method='post'>
        <?php
        echo '<p>Lista vozila:</p>';
        foreach($vozila as $vozilo){
        echo '<input type="radio" name="vozilo" id="'.$vozilo.'"value="'.$vozilo.'">
        <label for="'.$vozilo.'">'.$vozilo.'</label><br>';
        }
        ?>
        <input type="submit" value="Pošalji">
    </form>
    <?php
    if(isset($_POST['vozilo']))
        echo '<p>Odabrana je marka vozila '.$_POST['vozilo'].'</p>';
    ?>
</body>
</html>