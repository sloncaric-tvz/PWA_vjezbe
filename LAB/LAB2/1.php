<?php
$trenutnaBoja = "#FFFFFF";

if(isset($_POST['trenutnaBoja'])){
    $trenutnaBoja = $_POST['trenutnaBoja'];
}
if(isset($_POST['boja'])){
    $boja = $_POST['boja'];

    if(isset($_POST['potvrda'])){
        $trenutnaBoja = $boja;
    }
}
else {
    $boja = "#FFFFFF";
}

$potvrda = isset($_POST['potvrda']) ? "checked" : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
        background-color:<?php echo $trenutnaBoja?>;
        }
    fieldset{
        background-color:#FFFFFF;
    }
    </style>
</head>
<body>
    <main>
        <form method="post" action="1.php">
            <input type="hidden" name="trenutnaBoja" value="<?php echo $trenutnaBoja; ?>">
            <fieldset>
                <label><input type="color" name="boja" value="<?php echo $boja?>"> Odaberi željenu boju</label>
            </fieldset>

            <fieldset>
                <label>Želite li promijeniti boju?</label>
                <label><input type="checkbox" name="potvrda" <?php echo $potvrda?>> Da, želim promijeniti boju.</label>
            </fieldset>
            
            <fieldset>
                <button type="submit">Promijeni boju</button>
            </fieldset>
        </form>
        <p><?php echo $boja?></p>
        <p><?php echo $potvrda?></p>
        <p><?php echo $trenutnaBoja?></p>
    </main>
</body>
</html>