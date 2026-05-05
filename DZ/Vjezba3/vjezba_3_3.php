<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vjezba_3_3</title>
    <style>
        body{
            margin:20px auto;
            width:25%;
        }
        input[type="number"]{
            display:block;
            width:100%;
        }
        label{
            font-weight:bold;
            width: 100%;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <label for="ocjena1">Ocjena 1. kolokvija: </label>
        <input type="number" name='ocjena1' id='ocjena1' min='1' max='5'><br>
        <label for="ocjena2">Ocjena 2. kolokvija: </label>
        <input type="number" name='ocjena2' id='ocjena2' min='1' max='5'><br>
        <input type="submit" value="Pošalji">
    </form>
    <?php
        if(isset($_POST['ocjena1']) && isset($_POST['ocjena2']) && $_POST['ocjena1'] != '' && $_POST['ocjena2'] != ''){
            $ocjene = array($_POST['ocjena1'], $_POST['ocjena2']);
            if(in_array(1, $ocjene)){
                echo "<p>Jedna od ocjena iz kolokvija je negativna! Zaključna ocjena je 1.</p>";
            }
            else{
                $prosjek = array_sum($ocjene) / count($ocjene);
                $zakljucno = round($prosjek);
                echo "<p>Prosjek ocjena iz kolokvija je $prosjek.<br>Zaključna ocjena je $zakljucno.</p>";
            }
            
        }
    ?>
</body>
</html>