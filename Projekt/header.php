<?php
include 'connect.php';

$query = "SELECT id, ime FROM kategorije";
$result = mysqli_query($dbc, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Šokantno.hr</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <header>
        <a href="index.php"><h1>Šokantno.hr</h1></a>
        <nav>
            <a href="index.php">Home</a>
            <?php while($row = mysqli_fetch_array($result)): ?>
                <a href="kategorija.php?id=<?= strtolower($row['id']); ?>"><?= $row['ime']; ?></a>
            <?php endwhile; ?>
            <a href="unos.php">Unos</a>
            <a href="administracija.php">Administracija</a>
        </nav>
    </header>
