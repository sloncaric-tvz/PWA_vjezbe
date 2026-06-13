<?php
require_once 'header.php';
?>

<main>
    <?php
        $query = "SELECT id, ime FROM kategorije";
        $result_kat = mysqli_query($dbc, $query);
        while($kategorija = mysqli_fetch_array($result_kat)):
            $katId = $kategorija['id'];
            $query_vijesti = "SELECT id, naslov, sazetak, slika_url, datum
                            FROM vijesti
                            WHERE idKategorija=$katId
                            AND arhiva = 0
                            ORDER BY datum DESC
                            LIMIT 3";
            $result_vijesti = mysqli_query($dbc, $query_vijesti); ?>
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
                                <p class="date"><?= $vijest['datum']; ?></p>
                            </article>
                        </a>
                    <?php endwhile; ?>
                </section>
    <?php endwhile; ?>
</main>

<?php
require_once('footer.php');
?>