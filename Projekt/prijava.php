<?php
include 'header.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $uspjesnaPrijava = false;

    $query = "SELECT ime, korisnickoIme, lozinka, razina FROM korisnik WHERE korisnickoIme = ?;";
    $stmt = mysqli_stmt_init($dbc);
    if(mysqli_stmt_prepare($stmt, $query)){
        mysqli_stmt_bind_param($stmt, 's', $_POST['korisnickoIme']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    mysqli_stmt_bind_result($stmt, $ime, $korisnickoIme, $lozinka, $admin);
    if(mysqli_stmt_num_rows($stmt) > 0){
        mysqli_stmt_fetch($stmt);
        if(password_verify($_POST['lozinka'], $lozinka)){
            $uspjesnaPrijava = true;
            $_SESSION['ime'] = $ime;
            $_SESSION['korisnik'] = $korisnickoIme;
            $_SESSION['admin'] = $admin;

            header('Location: administracija.php');
        }
    }

}  
?>
<main>
    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">
            <?php if(isset($uspjesnaPrijava) && !$uspjesnaPrijava): ?>
                <div class = "login-warning">Neispravno korisničko ime ili lozinka.</div>
            <?php endif; ?>
            <div class="form-item">
                <label for="korisnickoIme">Korisničko ime:</i></label>
                <div class="form-field">
                    <input type="text" name="korisnickoIme" id="korisnickoIme" maxlength="50" class="form-field-textual" required>
                </div>
            </div>
            <div class="form-item">
                <label for="lozinka">Lozinka:</label>
                <div class="form-field">
                    <input type="password" name="lozinka" id="lozinka" class="form-field-textual" required>
                </div>
            </div>
            <div class="form-item form-actions">
                <?php if(isset($uspjesnaPrijava) && !$uspjesnaPrijava): ?>
                    <div>Ako niste registrirani korisnik, <a href="registracija.php">registrirajte se.</a></div>
                <?php endif; ?>
                <button type="submit" value="Prijava">Prijava</button>
            </div>
        </form>
    </div>
</main>
<?php
include 'footer.php';
?>