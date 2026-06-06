<?php
session_start();

$username = $_SESSION['username'];
echo "Dobro došli, $username";
if($_SESSION['razina'] == 1){
    echo " Vaša razina je administrator.";
}
?>
<br>
<a href="index.php">Natrag</a>
