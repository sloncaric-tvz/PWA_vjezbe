<?php
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $katId = $_GET['id'];
    $query = "SELECT ime FROM kategorije WHERE id=$katId;";
    $result = mysqli_query($dbc, $query);

    $kategorija = mysqli_fetch_array($result);

    $query_vijesti = "SELECT id, naslov, sazetak, slika_url
                        FROM vijesti
                        WHERE idKategorija=$katId
                        AND arhiva = 0
                        ORDER BY datum DESC";
        $result_vijesti = mysqli_query($dbc, $query_vijesti); 
}
?>
<main>
    <hr>
        <section>
            <h2><?= $kategorija['ime']; ?></h2>
            <?php while($vijest = mysqli_fetch_array($result_vijesti)): ?>
                <a href="clanak.php?id=<?= $vijest['id']; ?>">
                    <article>
                        <div>
                            <img src="<?= $vijest['slika_url']; ?>" alt="slika za clanak">
                        </div>
                        <h3><?= $vijest['naslov']; ?></h3>
                        <p><?= $vijest['sazetak']; ?></p>
                    </article>
                </a>
            <?php endwhile; ?>
        </section>
</main>
<?php
include 'footer.php';
?>