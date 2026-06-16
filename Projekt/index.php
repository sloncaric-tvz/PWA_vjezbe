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
                            WHERE idKategorija=?
                            AND arhiva = 0
                            ORDER BY datum DESC
                            LIMIT 3";
            $stmt = mysqli_stmt_init($dbc);
            if(mysqli_stmt_prepare($stmt, $query_vijesti)){
                mysqli_stmt_bind_param($stmt, 'i', $katId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }
            mysqli_stmt_bind_result($stmt, $id, $naslov, $sazetak, $slika_url, $datum);
            ?>
            <hr>
                <section>
                    <h2><a href="kategorija.php?id=<?= $katId; ?>" class="section-link"><?= $kategorija['ime']; ?></a></h2>
                    <?php 
                    while(mysqli_stmt_fetch($stmt)): ?>
                        <a href="clanak.php?id=<?= $id; ?>">
                            <article>
                                <div>
                                    <img src="<?= $slika_url; ?>" alt="slika za clanak">
                                </div>
                                <h3><?= $naslov; ?></h3>
                                <p><?= $sazetak; ?></p>
                                <p class="date"><?= $datum; ?></p>
                            </article>
                        </a>
                    <?php endwhile; ?>
                </section>
    <?php endwhile; ?>
</main>

<?php
require_once('footer.php');
?>