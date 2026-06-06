<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
</head>
<body>
    <form action="skripta.php" method="post">
        <label for="username">Korisničko ime:</label>
        <input type="text" name="username" id="username" required><br />
        <label for="password">Lozinka:</label>
        <input type="password" name="password" id="password" required><br />
        <input type="submit" value="Registriraj se">
    </form>
</body>
</html>