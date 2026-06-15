<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="pojam" id="pojam">
        <input type="submit" value="Traži">
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['pojam'])):
            $conn = mysqli_connect("localhost", "root", "", "vjezba6");
            $pojam = $_POST['pojam'];
            $query = "SELECT firstname, lastname FROM users
                        WHERE firstname LIKE '%$pojam%' OR lastname LIKE '%$pojam%'
                        ORDER BY lastname ASC";
            $result = mysqli_query($conn, $query);

            while($row = mysqli_fetch_array($result)):?>
                <p><?= $row['firstname']; ?> <?= $row['lastname'];?></p>
    <?php endwhile;
        mysqli_close($conn);
            endif;?>
</body>
</html>