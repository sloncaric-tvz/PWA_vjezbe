<?php
include 'header.php';

if (isset($_GET['id'])):
    $katId = $_GET['id'];
    $query_kat = "SELECT ime FROM kategorije WHERE id=?;";
    $stmt_kat = mysqli_stmt_init($dbc);
    if(mysqli_stmt_prepare($stmt_kat, $query_kat)){
        mysqli_stmt_bind_param($stmt_kat, 'i', $katId);
        mysqli_stmt_execute($stmt_kat);
        mysqli_stmt_store_result($stmt_kat);
    }
    if(mysqli_stmt_num_rows($stmt_kat) == 0){
        header('Location: index.php');
    }
    mysqli_stmt_bind_result($stmt_kat, $kategorija);
    mysqli_stmt_fetch($stmt_kat);

    $query_vijesti = "SELECT id, naslov, sazetak, slika_url, datum
                        FROM vijesti
                        WHERE idKategorija=?
                        AND arhiva = 0
                        ORDER BY datum DESC";
    $stmt_vijesti = mysqli_stmt_init($dbc);

    if(mysqli_stmt_prepare($stmt_vijesti, $query_vijesti)){
        mysqli_stmt_bind_param($stmt_vijesti, 'i', $katId);
        mysqli_stmt_execute($stmt_vijesti);
        mysqli_stmt_store_result($stmt_vijesti);
    }
    mysqli_stmt_bind_result($stmt_vijesti, $id, $naslov, $sazetak, $slika_url, $datum);
    //$result_vijesti = mysqli_query($dbc, $query_vijesti); 

?>
<main>
    <h2 class="page-title"><?= $kategorija; ?></h2>
    <hr>
        <section>
            <?php while(mysqli_stmt_fetch($stmt_vijesti)): ?>
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
</main>
<?php
else:
    header('Location: index.php');
endif;

include 'footer.php';
?>