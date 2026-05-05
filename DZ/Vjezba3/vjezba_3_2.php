<?php
$prvi = isset($_POST['prvi_broj']) && $_POST['prvi_broj'] != '' ? $_POST['prvi_broj'] : null;
$drugi = isset($_POST['drugi_broj']) && $_POST['drugi_broj'] != '' ? $_POST['drugi_broj'] : null;
$operator = isset($_POST['action']) && $_POST['action'] != '' ? $_POST['action'] : null;

switch($operator){
    case '+':
        $rez = $prvi + $drugi;
        break;
    case '-':
        $rez = $prvi - $drugi;
        break;
    case '*':
        $rez = $prvi * $drugi;
        break;
    case '/' && $drugi != 0:
        $rez = $prvi / $drugi;
        break;
    default:
        $rez=null;
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vjezba_3_2</title>
</head>
<body>
    <form action="" method='post'>
        <label for="prvi_broj">Upiši prvi broj</label>
        <input type="number" name='prvi_broj' id='prvi_broj' min='1' max='9'>
        <label for="drugi_broj">Upiši drugi broj</label>
        <input type="number" name='drugi_broj' id='drugi_broj' min='1' max='9'>
        <p>Rezultat: <?php echo $rez;?></p>
        <input type="submit" name='action' value='+'>
        <input type="submit" name='action' value='-'>
        <input type="submit" name='action' value='*'>
        <input type="submit" name='action' value='/'>
    </form>    
</body>
</html>