<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vjezba_3";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Neuspješno povezivanje na bazu: " . $conn->connect_error);
}
echo "Uspješno povezivanje na bazu.";

if(isset($_POST['ime']) && !empty($_POST['ime'])){
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $jmbag = $_POST['jmbag'];
    $email = $_POST['mail'];

    $sql = "INSERT INTO student (ime_studenta, prezime_studenta, jmbag, e_mail)
    VALUES ('$ime', '$prezime', $jmbag, '$email')";

    if ($conn->query($sql) === TRUE) {
    echo "<br />U bazu je dodan zapis: $ime, $prezime, $jmbag, $email";
    } else {
    echo "Greška: " . $sql . "<br>" . $conn->error;
    }
}
else{
    echo "<br />Greška pri unosu podataka!";
}

$conn->close();
?>
<br>
<a href="index.php">Natrag</a>
