<?php

$conn = mysqli_connect("localhost", "root", "", "vjezba6");

if($_SERVER['REQUEST_METHOD'] === "POST" ){
            $userId = $_POST['id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $country = $_POST['country'];

            $query = "UPDATE `users2` SET firstname = ?, lastname = ?, country = ? WHERE id = ?;";
            $stmt= mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssi", $firstname, $lastname, $country, $userId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header('Location: vjezba_7_3.php');
        }

$query = "SELECT users2.id AS userId, firstname, lastname, countries.name AS countryName
         FROM users2 
         JOIN countries ON users2.country = countries.id
         ORDER BY lastname ASC;";

$users = mysqli_query($conn, $query);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(!isset($_GET['id'])): ?>
    <ul>
        <?php while($row = mysqli_fetch_array($users)):?>
            <li><a href="vjezba_7_3.php?id=<?= $row['userId'];?>">
                <i>uredi</i></a> <?= $row['firstname']; ?> <?= $row['lastname']; ?> <strong>(<?= $row['countryName']; ?>)</strong></li>
        <?php endwhile; ?>
    </ul>
    <?php else: 
        $userId = $_GET['id'];
        $query = "SELECT * 
                FROM countries 
                ORDER BY name ASC;";

        $countries = mysqli_query($conn, $query);
        
        $query = "SELECT firstname, lastname, country
                    FROM users2
                    WHERE id = $userId;";
        $user = mysqli_fetch_array(mysqli_query($conn, $query));?>
        <form action="" method="post">
            <input type="hidden" name="id", value="<?= $userId; ?>">
            <label for="firstname"></label>
            <input type="text" name="firstname" id="firstname" value="<?=$user['firstname'];?>">
            <label for="lastname"></label>
            <input type="text" name="lastname" id="lastname" value="<?=$user['lastname'];?>">
            <select name="country" id="country">
                <?php while($row = mysqli_fetch_array($countries)):?>
                    <option value="<?= $row['id'] ;?>" <?= $user['country'] == $row['id'] ? "selected" : ""; ?>><?= $row['name']; ?></option>
                <?php endwhile; ?>
            </select>
            <input type="submit" value="Potvrdi promjene">
            <input type="reset" value="Vrati na izvorno">
        </form><br>
        <a href="vjezba_7_3.php">Natrag</a>
    <?php endif;?>
</body>
</html>