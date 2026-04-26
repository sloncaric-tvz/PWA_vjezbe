<?php
// default background
$trenutnaBoja = "#FFFFFF";

// if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // previously saved color (from hidden field)
    if (isset($_POST['trenutnaBoja'])) {
        $trenutnaBoja = $_POST['trenutnaBoja'];
    }

    // new selected color
    $boja = isset($_POST['boja']) ? $_POST['boja'] : "#FFFFFF";

    // if checkbox is checked → update background
    if (isset($_POST['potvrda'])) {
        $trenutnaBoja = $boja;
    }
} else {
    $boja = "#FFFFFF";
}

// checkbox state
$potvrda = isset($_POST['potvrda']) ? "checked" : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: <?php echo $trenutnaBoja; ?>;
        }
        fieldset{
            background-color:#FFFFFF;
        }
    </style>
</head>
<body>
    <main>
        <form method="post" action="">
            
            <!-- hidden field to remember current background -->
            <input type="hidden" name="trenutnaBoja" value="<?php echo $trenutnaBoja; ?>">

            <fieldset>
                <label>
                    <input type="color" name="boja" value="<?php echo $boja; ?>">
                    Odaberi željenu boju
                </label>
            </fieldset>

            <fieldset>
                <label>Želite li promijeniti boju?</label>
                <label>
                    <input type="checkbox" name="potvrda" <?php echo $potvrda; ?>>
                    Da, želim promijeniti boju.
                </label>
            </fieldset>
            
            <fieldset>
                <button type="submit">Promijeni boju</button>
            </fieldset>
        </form>

        <p>Trenutna boja: <?php echo $trenutnaBoja; ?></p>
    </main>
</body>
</html>