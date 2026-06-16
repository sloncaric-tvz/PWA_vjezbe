<?php
include 'header.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $lozinka1 = $_POST['lozinka1'];
    $lozinka2 = $_POST['lozinka2'];

    if($lozinka1 === $lozinka2){//provjeri podudaraju li se lozinke
        $korisnickoIme = $_POST['korisnickoIme'];
        
        $query = "SELECT * FROM korisnik WHERE korisnickoIme = ?;";
        $stmt = mysqli_stmt_init($dbc);
        if(mysqli_stmt_prepare($stmt, $query)){
            mysqli_stmt_bind_param($stmt, "s", $korisnickoIme);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        if(mysqli_stmt_num_rows($stmt) > 0){ //javi grešku ako je korisničko ime zauzeto
            $greskaKor = "Korisničko ime je već zauzeto";
        } else {
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            //hashiraj lozinku
            $hash = password_hash($lozinka1, CRYPT_BLOWFISH);
            $query = "INSERT INTO korisnik (ime, prezime, korisnickoIme, lozinka)
                        VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmt, $query)){
                mysqli_stmt_bind_param($stmt, "ssss", $ime, $prezime, $korisnickoIme, $hash);
                mysqli_stmt_execute($stmt);
                $_SESSION['ime'] = $ime;
                $_SESSION['korisnik'] = $korisnickoIme;
                $_SESSION['admin'] = 0;
                header('Location: administracija.php');
            }
        }
    }
    else{
        $greskaLoz = 'Lozinke se ne podudaraju';
    }
}
?>

<div class="form-container">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-item">
            <label for="ime">Ime:</label>
            <div class="form-field">
                <input type="text" name="ime" id="ime" maxlength="50" class="form-field-textual" required
                 value="<?= isset($_POST['ime']) ? $_POST['ime'] : "";?>">
            </div>
        </div>
        <div class="form-item">
            <label for="prezime">Prezime:</label>
            <div class="form-field">
                <input type="text" name="prezime" id="prezime" maxlength="50" class="form-field-textual" required
                 value="<?= isset($_POST['prezime']) ? $_POST['prezime'] : "";?>">
            </div>
        </div>
        <div class="form-item">
            <label for="korisnickoIme">Korisničko ime: <i><?= isset($greskaKor) ? '('.$greskaKor.')' : "";?></i></label>
            <div class="form-field">
                <input type="text" name="korisnickoIme" id="korisnickoIme" maxlength="50" class="form-field-textual" required
                 value="<?= isset($_POST['korisnickoIme']) ? $_POST['korisnickoIme'] : "";?>" 
                 <?= isset($greskaKor) ? 'autofocus' : "";?>>
            </div>
        </div>
        <div class="form-item">
            <label for="lozinka1">Lozinka:</label>
            <div class="form-field">
                <input type="password" name="lozinka1" id="lozinka1" class="form-field-textual" required
                <?= isset($greskaLoz) ? 'autofocus' : "";?>>
            </div>
        </div>
        <div class="form-item">
            <label for="lozinka2">Potvrdite lozinku: <i><?= isset($greskaLoz) ? '('.$greskaLoz.')' : "";?></i></label>
            <div class="form-field">
                <input type="password" name="lozinka2" id="lozinka2" class="form-field-textual" required>
            </div>
        </div>
        <div class="form-item form-actions">
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" value="Prihvati">Prihvati</button>
        </div>
    </form>
</div>

<?php
include 'footer.php';
?>