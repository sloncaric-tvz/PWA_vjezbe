<?php
include 'header.php';

if(!isset($_SESSION['admin'])){
    $_SESSION['login_redirect'] = 'unos.php';
    header('Location: prijava.php');
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $naslov = trim($_POST['naslov'] ?? '');
    $sadrzaj = trim($_POST['sadrzaj'] ?? '');
    $sazetak = trim($_POST['sazetak'] ?? '');
    $kategorija = trim($_POST['kategorija'] ?? '');
    $arhiviraj = isset($_POST['arhiv']) ? 1 : 0;

    if (isset($_FILES['slika']) && $_FILES['slika']['error'] === UPLOAD_ERR_OK) {
        $img_dir = 'assets/img/';

        if (!is_dir($img_dir)) {
            mkdir($img_dir, 0755, true);
        }

        $img_name = basename($_FILES['slika']['name']);
        $image_file_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($image_file_type, $allowed_types, true)) {
            $stored_img_file = $img_dir . $img_name; /* DODATI ID CLANKA KAO IME SLIKE */

            if (move_uploaded_file($_FILES['slika']['tmp_name'], $stored_img_file)) {
                $image_path = $stored_img_file;
            } else {
                $error_message = 'Slika nije uspješno spremljena.';
            }
        } else {
            $error_message = 'Dozvoljene su samo JPG, JPEG, PNG i GIF slike.';
        }
    }
    $query_insert = "INSERT INTO `vijesti` (`naslov`, `sazetak`, `tekst`, `slika_url`, `idKategorija`, `arhiva`)
        VALUES (?, ?, ?, ?, ?, ?);";
    $stmt_insert = mysqli_stmt_init($dbc);

    if(mysqli_stmt_prepare($stmt_insert, $query_insert)){
        mysqli_stmt_bind_param($stmt_insert, 'ssssii', $naslov, $sazetak, $sadrzaj, $image_path, $kategorija, $arhiviraj);
        mysqli_stmt_execute($stmt_insert);
    }
    $idClanak = mysqli_query($dbc, "SELECT LAST_INSERT_ID() AS id;");
    $idClanak = mysqli_fetch_array($idClanak)['id'];
    header("Location: clanak.php?id=$idClanak");
    }
$query_select = "SELECT id, ime FROM kategorije";
$kategorije = mysqli_query($dbc, $query_select); 
?>

<main>
    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-item">
                <label for="naslov">Naslov:</label>
                <div class="form-field">
                    <input type="text" name="naslov" id="naslov" maxlength="100" class="form-field-textual" autofocus required>
                </div>
            </div>
            <div class="form-item">
                <label for="sazetak">Kratki sadržaj (100 znakova)</label>
                <div class="form-field">
                    <textarea name="sazetak" id="sazetak" cols="30" rows="2" maxlength="100" class="form-field-textual" required></textarea>
                </div>
            </div>
            <div class="form-item">
                <label for="sadrzaj">Sadržaj:</label>
                <div class="form-field">
                    <textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10" class="form-field-textual" required></textarea>
                </div>
            </div>
            <div class="form-item">
                <label for="slika">Slika: </label>
                <div class="form-field">
                    <input type="file" accept="image/jpeg,image/gif,image/png" class="input-text" name="slika" id="slika" />
                </div>
            </div>
            <div class="form-item">
                <label for="kategorija">Kategorija vijesti</label>
                <div class="form-field">
                    <select name="kategorija" id="kategorija" class="form-field-textual" required>
                        <?php while($kategorija = mysqli_fetch_array($kategorije)): ?> 
                            <option value="<?=$kategorija['id'];?>"><?=$kategorija['ime'];?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="form-item form-item-checkbox">
                <label for="arhiv">Spremi u arhivu:</label>
                <div class="form-field">
                    <input type="checkbox" name="arhiv" id="arhiv">
                </div>
            </div>
            <div class="form-item form-actions">
                <button type="reset" value="Poništi">Poništi</button>
                <button type="submit" value="Prihvati">Prihvati</button>
            </div>
        </form>
    </div>
</main>

<?php
include('footer.php');
?>