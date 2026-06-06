<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab4";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Neuspješno povezivanje na bazu: " . $conn->connect_error);
}
echo "Uspješno povezivanje na bazu.";

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
<br>
<a href="index.php">Natrag</a>
