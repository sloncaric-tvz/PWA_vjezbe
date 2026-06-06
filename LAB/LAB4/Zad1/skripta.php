<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab4";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Neuspješno povezivanje na bazu: " . $conn->connect_error);
}

if(isset($_POST['username']) && !empty($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_pass = password_hash($password, CRYPT_BLOWFISH);

    $sql = "INSERT INTO users (username, password)
    VALUES ('$username', '$hashed_pass')";

    $username_check = "SELECT id FROM users WHERE username = '$username'";
    if(!$conn->query($username_check)->fetch_array()){
        if ($conn->query($sql) === TRUE) {
            echo "  Registracija je uspješna";
        } else {
            echo "Greška: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Korisničko ime se već koristi";
    }

    
}
?>
<br>
<a href="index.php">Natrag</a>
