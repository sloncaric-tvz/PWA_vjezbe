<?php
$naslov = "PHP dokument - vježba 1b";
$autor = "Stjepko Lončarić";
$opis = "Ovo je stranica izrađena kao drugi dio zadatka za vježbu.";
$linkInfo_href = "https://en.wikipedia.org/wiki/PHP";
$linkInfo_text = "Saznaj više o PHP-u";
$linkNatrag = "./vjezba_2_1.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $naslov; ?></title>
    <style>
        :root { --bg:#0f172a; --card:#ffffff; --text:#111827; --muted:#6b7280; --accent:#2563eb; }
        * {box-sizing:border-box;}
        body { margin:0; font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            background: var(--bg); color: var(--text) }
        h1 { margin:0 0 12px; font-size:2rem; }
        p { margin:0 0 12px; line-height:1.6; }
        .wrap { max-width: 720px; margin: 48px auto; background: var(--card); padding: 32px;
        border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,.08); }
        footer { font-size:0.9rem; color: var(--muted); }
        .btn { display: inline-block; padding: 10px 16px; border: 1px solid var(--accent); 
                border-radius: 10px; text-decoration: none;}
        .btn:hover { background: var(--accent); color: #fff; }
        .btn:focus-visible { outline: 3px solid var(--accent); }
        .btn:active { opacity:0.7; }
    </style>
</head>
<body>
    <main class="wrap">
        <h1><?php echo $naslov; ?></h1>
        <p>Ovu stranicu izradio je <strong><?php echo $autor; ?></strong></p>
        <p><?php echo $opis; ?></p>
        <p>
            <a class="btn" href="<?php echo $linkInfo_href; ?>"
            target="_blank" rel="noopener">
                <?php echo $linkInfo_text; ?>
            </a>
            <a class="btn" href="<?php echo $linkNatrag ?>">
                Natrag na vježba 1
            </a>
        </p>
        <footer>
            &copy; <?php echo date('Y'); ?> - DEMO za PHP
        </footer>
    </main>
</body>
</html>
<!-- Naziv datoteke: vjezba_2_1b.php -->