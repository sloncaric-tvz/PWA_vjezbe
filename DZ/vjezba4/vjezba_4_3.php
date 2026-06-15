<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label for="recenica">Ulazni niz:</label><br>
        <input type="text" name="recenica" id="recenica">
        <input type="submit" value="Prebroji riječi">
    </form>
    <?php
        if(isset($_GET['recenica'])){
            $ulaz = $_GET['recenica'];
            $brRijeci = str_word_count($ulaz);
            echo "<p>Ulazni niz: <strong><i>$ulaz</i></strong> sadrži $brRijeci rijeci.</p>";
        }
    ?>
</body>
</html>