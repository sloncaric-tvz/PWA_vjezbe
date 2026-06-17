<?php
require_once 'header.php';

if(!isset($_SESSION['admin'])){
    $_SESSION['login_redirect'] = 'administracija.php';
    header('Location: prijava.php');
} elseif ($_SESSION['admin'] == 0) {
    echo '<main><div class="form-container">
            Bok, '.$_SESSION['ime'].'! Nažalost, nemate administratorska prava.
        </div></main>';
    include 'footer.php';
    exit; 
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $naslov = trim($_POST['naslov'] ?? '');
        $sadrzaj = trim($_POST['sadrzaj'] ?? '');
        $sazetak = trim($_POST['sazetak'] ?? '');
        $kategorija = trim($_POST['kategorija'] ?? '');
        $arhiva = isset($_POST['arhiv']) ? 1 : 0;

        if($_FILES['slika']['name'] === ''){ //dohvaća staru sliku iz baze ako nije odabrana nova
            $stmt_slika = mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmt_slika, "SELECT slika_url FROM vijesti WHERE id = ?;")){
                mysqli_stmt_bind_param($stmt_slika, 'i', $id);
                mysqli_stmt_execute($stmt_slika);
                mysqli_stmt_store_result($stmt_slika);
            }
            mysqli_stmt_bind_result($stmt_slika, $stara_slika);
            mysqli_stmt_fetch($stmt_slika);
        }
        elseif (isset($_FILES['slika']) && $_FILES['slika']['error'] === UPLOAD_ERR_OK) { //dodaje novu sliku
            $img_dir = 'assets/img/';

            if (!is_dir($img_dir)) {
                mkdir($img_dir, 0755, true);
            }

            $img_name = basename($_FILES['slika']['name']);
            $image_file_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($image_file_type, $allowed_types, true)) {
                $stored_img_file = $img_dir . $img_name;

                if (move_uploaded_file($_FILES['slika']['tmp_name'], $stored_img_file)) {
                    $image_path = $stored_img_file;
                } else {
                    $error_message = 'Slika nije uspješno spremljena.';
                }
            } else {
                $error_message = 'Dozvoljene su samo JPG, JPEG, PNG i GIF slike.';
            }
        }
        if(isset($stara_slika)){
            $image_path = $stara_slika;
        }
        $update_query = "UPDATE vijesti SET naslov=?, 
                                        sazetak=?, 
                                        tekst=?, 
                                        idKategorija=?, 
                                        arhiva=?, 
                                        slika_url=?
                                        WHERE id=?;";

        $stmt_update = mysqli_stmt_init($dbc);
        if(mysqli_stmt_prepare($stmt_update, $update_query)){
            mysqli_stmt_bind_param($stmt_update, 'sssiisi', $naslov, $sazetak, $sadrzaj, $kategorija, $arhiva, $image_path, $id);
            mysqli_stmt_execute($stmt_update);
        }

    } elseif (isset($_POST['delete'])){ //obriši clanak
        $delete_query = "DELETE FROM vijesti WHERE id=?;";

        $stmt_delete = mysqli_stmt_init($dbc);
        if(mysqli_stmt_prepare($stmt_delete, $delete_query)){
            mysqli_stmt_bind_param($stmt_delete, 'i', $id);
            mysqli_stmt_execute($stmt_delete);
        }

    } elseif (isset($_POST['new_category'])){ //dodaj novu kategoriju

        $nova_kat = $_POST['ime_kategorije'];
        $new_category_query = "INSERT INTO kategorije (ime) VALUES (?);";

        $stmt_new_category = mysqli_stmt_init($dbc);
        if(mysqli_stmt_prepare($stmt_new_category, $new_category_query)){
            mysqli_stmt_bind_param($stmt_new_category, 's', $nova_kat);
            mysqli_stmt_execute($stmt_new_category);
        }

    } elseif (isset($_POST['delete_category'])){ //obrisi kategoriju
        $obrisi_kat = $_POST['ime_kategorije'];
        $delete_category_query = "DELETE FROM kategorije WHERE ime = ?;";

        $stmt_delete_category = mysqli_stmt_init($dbc);
        if(mysqli_stmt_prepare($stmt_delete_category, $delete_category_query)){
            mysqli_stmt_bind_param($stmt_delete_category, 's', $obrisi_kat);
            mysqli_stmt_execute($stmt_delete_category);
        }
    }
    header('Location: administracija.php');
    
}
$query = "SELECT id, ime FROM kategorije";
$result_kat = mysqli_query($dbc, $query);

if(isset($_GET['id'])){ //pronađi odabranu vijest u bazi
    $id_vijest = $_GET['id'];
    $query = "SELECT kategorije.ime AS imeKat, kategorije.id AS idKat, naslov, sazetak, tekst, slika_url, arhiva, datum
                FROM vijesti
                JOIN kategorije ON kategorije.id = vijesti.idKategorija
                WHERE vijesti.id = ?;";

    $stmt_vijest = mysqli_stmt_init($dbc);
    if(mysqli_stmt_prepare($stmt_vijest, $query)){
        mysqli_stmt_bind_param($stmt_vijest, 'i', $id_vijest);
        mysqli_stmt_execute($stmt_vijest);
        mysqli_stmt_store_result($stmt_vijest);
    }
    if(mysqli_stmt_num_rows($stmt_vijest) > 0){
        mysqli_stmt_bind_result($stmt_vijest, $vijestKategorijaIme, $vijestKategorijaId, $naslov, $sazetak, $tekst, $pathSlika, $arhiva, $datum);
        mysqli_stmt_fetch($stmt_vijest);
    } else {
        header('Location: administracija.php');
    }
    /*$result = mysqli_query($dbc, $query);
    $vijest = mysqli_fetch_array($result);

    $naslov = $vijest['naslov'];
    $tekst = $vijest['tekst'];
    $sazetak = $vijest['sazetak'];
    $vijestKategorijaId = $vijest['idKat'];
    $vijestKategorijaIme = $vijest['imeKat'];
    $pathSlika = $vijest['slika_url'];

    $arhiva = $vijest['arhiva'];*/

    

    $slikaDisclaim = "This image is used for web-design learning purposes.";
}
?>

<main>
<!--Prikaz svih vijesti ako nije odabrana određena koja će se uređivati-->
    <h2 class="page-title">Administracija</h2>
    <?php if(!isset($_GET['id'])):
            while($kategorija = mysqli_fetch_array($result_kat)):
                $katId = $kategorija['id'];
                $query_vijesti = "SELECT id, naslov, sazetak, slika_url, datum, arhiva
                                FROM vijesti
                                WHERE idKategorija=$katId
                                ORDER BY datum DESC";
                $result_vijesti = mysqli_query($dbc, $query_vijesti); ?>
                <hr>
                    <section>
                        <h2><?= $kategorija['ime']; ?></h2>
                        <?php while($vijest = mysqli_fetch_array($result_vijesti)): ?>
                            <a href="administracija.php?id=<?= $vijest['id']; ?>">
                                <article>
                                    <div>
                                        <img src="<?= $vijest['slika_url']; ?>" alt="slika za clanak">
                                    </div>
                                    <h3><?= ($vijest['arhiva']?'<i>(ARHIVIRANO)</i> ':'').$vijest['naslov']; ?></h3>
                                    <p><?= $vijest['sazetak']; ?></p>
                                    <p class="date"><?= $vijest['datum']; ?></p>
                                </article>
                            </a>
                        <?php endwhile; ?>
                    </section>
        <?php endwhile; ?>
        <section>
            <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-item">
                        <div class="form-field">
                            <input type="text" name="ime_kategorije" id="nova_kat"
                                    maxlength="100" class="form-field-textual" required>
                        </div>
                    </div>
                    <div class="form-item form-actions">
                        <button type="submit" name="new_category" value="Prihvati">Dodaj novu kategoriju</button>
                        <button type="submit" name="delete_category" value="Obriši">Obriši kategoriju</button>
                    </div>
            </form>
        </section>
    <?php else: ?>
    <!-------Prikaz odabrane vijesti za uređivanje-------------------->
        <div class="form-container">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id_vijest ;?>">
                <div class="form-item">
                    <label for="naslov">Naslov:</label>
                    <div class="form-field">
                        <input type="text" name="naslov" id="naslov" value="<?= $naslov ;?>"
                                maxlength="100" class="form-field-textual" autofocus required>
                    </div>
                </div>
                <div class="form-item">
                    <label for="sazetak">Kratki sadržaj (100 znakova)</label>
                    <div class="form-field">
                        <textarea name="sazetak" id="sazetak" cols="30" rows="2" 
                        maxlength="100" class="form-field-textual" required><?= $sazetak ;?></textarea>
                    </div>
                </div>
                <div class="form-item">
                    <label for="sadrzaj">Sadržaj:</label>
                    <div class="form-field">
                        <textarea name="sadrzaj" id="sadrzaj" cols="30" rows="10" 
                                class="form-field-textual" required><?= $tekst ;?></textarea>
                    </div>
                </div>
                <div class="form-item">
                    <label for="slika">Slika: </label>
                    <div class="form-field">
                        <input type="file" accept="image/jpeg,image/gif,image/png" value="<?= substr_replace($pathSlika,"",0,11) ;?>"
                                    class="input-text" name="slika" id="slika" />
                        <br>
                        <img src="<?= $pathSlika ;?>" alt="" width="100px">
                    </div>
                </div>
                <div class="form-item">
                    <label for="kategorija">Kategorija vijesti</label>
                    <div class="form-field">
                        <select name="kategorija" id="kategorija" class="form-field-textual" required>
                            <?php while($kategorija = mysqli_fetch_array($result_kat)): ?> 
                                <option value="<?=$kategorija['id'];?>" <?= $kategorija['id'] == $vijestKategorijaId ? 'selected' : '' ;?>>
                                    <?=$kategorija['ime'];?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="form-item form-item-checkbox">
                    <label for="arhiv">Spremi u arhivu:</label>
                    <div class="form-field">
                        <input type="checkbox" name="arhiv" id="arhiv" <?= $arhiva ? 'checked' : '' ;?>>
                    </div>
                </div>
                <div class="form-item form-actions">
                    <button type="reset" value="Vrati na staro">Vrati na staro</button>
                    <button type="submit" name="update" value="Prihvati">Prihvati</button>
                    <button type="submit" name="delete" value="Izbriši" class="delete-button">Izbriši</button>
                </div>
            </form>
        </div>
    <?php endif;?>
</main>

<?php
require_once('footer.php');
?>