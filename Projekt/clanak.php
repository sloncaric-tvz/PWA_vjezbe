<?php
include 'header.php';

if (isset($_GET['id'])):
    $id_vijest = $_GET['id'];
    $query = "SELECT kategorije.ime AS imeKat, naslov, sazetak, tekst, slika_url, datum
                FROM vijesti
                JOIN kategorije ON kategorije.id = vijesti.idKategorija
                WHERE vijesti.id = ?;";

    $stmt = mysqli_stmt_init($dbc);
    if(mysqli_stmt_prepare($stmt, $query)){
        mysqli_stmt_bind_param($stmt, 'i', $id_vijest);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    if(mysqli_stmt_num_rows($stmt) == 0){
        header('Location: index.php');
    }
    mysqli_stmt_bind_result($stmt, $kategorija, $naslov, $sazetak, $tekst, $pathSlika, $datum);
    mysqli_stmt_fetch($stmt);

    /*$result = mysqli_query($dbc, $query);
    $vijest = mysqli_fetch_array($result);

    $naslov = $vijest['naslov'];
    $tekst = $vijest['tekst'];
    $sazetak = $vijest['sazetak'];
    $kategorija = $vijest['imeKat'];
    $pathSlika = $vijest['slika_url'];*/

    $slikaDisclaim = "Slika se koristi u svrhe učenja izrade web aplikacija.";

?>

    <main class="article-main">
        <?php if ($naslov !== ''): ?>
            <article class="article-detail">
                <div class="article-info">
                    <p class="category"><?= $kategorija; ?></p>
                    <h1 class="title"><?= $naslov; ?></h1>
                    <p class="summary"><?= $sazetak; ?></p>
                    <p class="date"><?=$datum;?></p>
                    <span class="summary-rule" aria-hidden="true"></span>
                </div>

                <?php if ($pathSlika !== ''): ?>
                    <figure class="article-image">
                        <img src="<?= $pathSlika; ?>" alt="<?= $naslov; ?>">
                        <figcaption><?= $slikaDisclaim ;?></figcaption>
                    </figure>
                <?php endif; ?>

                <div class="article-content">
                    <p><?= nl2br(htmlspecialchars($tekst)); ?></p>
                </div>

            </article>
        <?php else: ?>
            <p class="article-empty">Nema unesenog članka.</p>
        <?php endif; ?>
    </main>
<?php else: header('Location: index.php'); endif; ?>
<?php
include 'footer.php';
?>