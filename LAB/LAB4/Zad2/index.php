<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab4";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Neuspješno povezivanje na bazu: " . $conn->connect_error);
}

if(isset($_POST['username']) && !empty($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users where username = '$username'";
    
    if($row = $conn->query($sql)->fetch_array()){
        if(password_verify($_POST['password'], $row['password'])){
            $_SESSION['username'] = $row['username'];
            $_SESSION['razina'] = $row['razina_dozvole'];

            echo "Dobro došli.";
            if($_SESSION['razina'] == 1){
                echo " Vaša razina je administrator.";
            }
            echo "<br /><a href='skripta.php'>NEXT</a>";
        } else {
            echo "Neispravna lozinka";
        }
    } else {
        echo "Korisničko ime ne postoji";
    }

    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
</head>
<body>
    <form action="" method="post">
        <label for="username">Korisničko ime:</label>
        <input type="text" name="username" id="username" required><br />
        <label for="password">Lozinka:</label>
        <input type="password" name="password" id="password" required><br />
        <input type="submit" value="Prijava">
    </form>
</body>
</html>