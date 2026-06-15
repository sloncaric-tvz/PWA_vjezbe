<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="firstname" required><br>
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="lastname" required><br>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required><br>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br>
        <label for="country">Country</label>
        <select name="country" id="country">
            <option value="" disabled selected></option>
            <option value="AD">Andorra</option>
            <option value="AU">Australia</option>
            <option value="HR">Hrvatska</option>
        </select><br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] === "POST" ){

            $conn = mysqli_connect("localhost", "root", "", "vjezba6");

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $country = $_POST['country'];

            $query = "INSERT INTO `users2` (`firstname`, `lastname`, `email`, `username`, `password`, `country`) 
                VALUES (?,?,?,?,?,?);";
            $stmt= mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $email, $username, $password, $country);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
?>

</body>
</html>