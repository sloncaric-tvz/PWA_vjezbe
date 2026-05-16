<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vjezba_3";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Neuspješno povezivanje na bazu: " . $conn->connect_error);
}

$sql = "SELECT id, ime, prezime, spol, telefon, email, godine, hobi FROM korisnik";
$result = $conn->query($sql);

$style = 'style="border: 1px solid black; padding: 5px"';

if ($result->num_rows > 0) {
    echo "<table style='border-collapse: collapse;'>
            <tr><th>ID</th><th>Ime</th><th>Prezime</th><th>Spol</th><th>Telefon</th><th>email</th><th>godine</th><th>hobi</th></tr>";
    while($row = $result->fetch_assoc()){
        if ($row['godine'] < 33){
            $boja = 'style = "background-color:blue;"';
        } else {
            $boja = 'style="background-color:red;"';
        }
        echo "<tr  $boja>";
        echo "<td $style>". $row['id'] . '</td>';
        echo "<td $style>". $row['ime'] . '</td>';
        echo "<td $style>". $row['prezime'] . '</td>';
        echo "<td $style>". $row['spol'] . '</td>';
        echo "<td $style>". $row['telefon'] . '</td>';
        echo "<td $style>". $row['email'] . '</td>';
        echo "<td $style>". $row['godine'] . '</td>';
        echo "<td $style>". $row['hobi'] . '</td>';
        echo '</tr>';
    }

} else {
    echo "0 pronađenih zapisa";
}

$conn->close();
?>