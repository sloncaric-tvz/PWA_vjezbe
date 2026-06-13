<?php
include 'header.php';

if (isset($_GET['id'])) {
    $id_vijest = $_GET['id'];
    $query = "SELECT kategorije.ime AS imeKat, naslov, sazetak, tekst, slika_url, datum
                FROM vijesti
                JOIN kategorije ON kategorije.id = vijesti.idKategorija
                WHERE vijesti.id = $id_vijest;";
    $result = mysqli_query($dbc, $query);
    $vijest = mysqli_fetch_array($result);

    $naslov = $vijest['naslov'];
    $tekst = $vijest['tekst'];
    $sazetak = $vijest['sazetak'];
    $kategorija = $vijest['imeKat'];
    $pathSlika = $vijest['slika_url'];

    $slikaDisclaim = "This image is used for web-design learning purposes.";
}
?>

    <main class="article-main">
        <?php if ($naslov !== ''): ?>
            <article class="article-detail">
                <div class="article-info">
                    <p class="category"><?= $kategorija; ?></p>
                    <h1 class="title"><?= $naslov; ?></h1>
                    <p class="summary"><?= $sazetak; ?></p>
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

<?php
include 'footer.php';
?>