<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab4";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['sifra']) && !empty($_POST['sifra'])){
    $naziv = $_POST['naziv'];
    $sifra = $_POST['sifra'];
    $ects = $_POST['ects'];

    $sql = "INSERT INTO kolegiji (sifra, naziv, ects) VALUES (?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){
        mysqli_stmt_bind_param($stmt, 'isi', $sifra, $naziv, $ects);
        if(mysqli_stmt_execute($stmt)){
            echo "Uspješno upisano u bazu";
        } else {
            echo "Greška pri upisu u bazu";
        }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeSQL Predmeti</title>
</head>
<body>
    <form action="" method="post">
        <label for="sifra">Šifra predmeta:</label>
        <input type="number" name="sifra" id="sifra" required><br />
        <label for="naziv">Naziv predmeta:</label>
        <input type="text" name="naziv" id="naziv" required><br />
        <label for="ects">ECTS:</label>
        <input type="number" name="ects" id="ects" required><br />
        <input type="submit" value="Potvrdi">
    </form>
</body>
</html>