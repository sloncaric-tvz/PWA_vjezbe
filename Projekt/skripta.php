<?php
$naslov = '';
$sadrzaj = '';
$sazetak = '';
$kategorija = '';
$image_path = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naslov = trim($_POST['naslov'] ?? '');
    $sadrzaj = trim($_POST['sadrzaj'] ?? '');
    $sazetak = trim($_POST['sazetak'] ?? '');
    $kategorija = trim($_POST['kategorija'] ?? '');

    if (isset($_FILES['slika']) && $_FILES['slika']['error'] === UPLOAD_ERR_OK) {
        $img_dir = 'uploads/';

        if (!is_dir($img_dir)) {
            mkdir($img_dir, 0755, true);
        }

        $img_name = basename($_FILES['slika']['name']);
        $image_file_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($image_file_type, $allowed_types, true)) {
            $stored_img_file = $img_dir . 'nekoime.' . $image_file_type; /* DODATI ID CLANKA KAO IME SLIKE */

            if (move_uploaded_file($_FILES['slika']['tmp_name'], $stored_img_file)) {
                $image_path = $stored_img_file;
            } else {
                $error_message = 'Slika nije uspješno spremljena.';
            }
        } else {
            $error_message = 'Dozvoljene su samo JPG, JPEG, PNG i GIF slike.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Članak</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <header>
        <h1>Naslov</h1>
        <nav>
            <a href="index.html">Home</a>
            <a href="#">Politika</a>
            <a href="#">Sport</a>
            <a href="#">Administracija</a>
            <a href="unos.php">Unos</a>
        </nav>
    </header>

    <main class="article-main">
        <?php if ($naslov !== ''): ?>
            <article class="article-detail">
                <div class="article-info">
                    <p class="category"><?php echo htmlspecialchars($kategorija); ?></p>
                    <h1 class="title"><?php echo htmlspecialchars($naslov); ?></h1>
                    <p class="summary"><?php echo htmlspecialchars($sazetak); ?></p>
                    <span class="summary-rule" aria-hidden="true"></span>
                </div>

                <?php if ($image_path !== ''): ?>
                    <figure class="article-image">
                        <img src="<?php echo htmlspecialchars($image_path); ?>" alt="<?php echo htmlspecialchars($naslov); ?>">
                        <figcaption>This image is used for web-design learning purposes.</figcaption>
                    </figure>
                <?php endif; ?>

                <div class="article-content">
                    <p><?php echo nl2br(htmlspecialchars($sadrzaj)); ?></p>
                </div>

                <?php if ($error_message !== ''): ?>
                    <p class="article-error"><?php echo htmlspecialchars($error_message); ?></p>
                <?php endif; ?>
            </article>
        <?php else: ?>
            <p class="article-empty">Nema unesenog članka.</p>
        <?php endif; ?>
    </main>

    <footer>
        <div>Stjepko Lončarić &copy;2026</div>
        <div><i class="fa fa-envelope"></i>sloncaric@tvz.hr</div>
    </footer>
</body>

</html>
