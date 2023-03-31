<html lang="fr">

<head>
    <?php
    $n = "Le Marche des Mangas"; // Titre
    $content = "Mon super site "; // Description
    $image = "/media/favicon.ico"; // Image
    $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
    require "./parts/head.php";

    ?>
</head>

<body style="background-color: lightgray;">
    <?php include "./parts/header.php"; ?>
    <div class="cards">
        <?php
        $mangas = $auth->searchManga("");
        if (count($mangas) > 0) {
            foreach ($mangas as $manga) {
        ?>
                <article class="card">
                    <a href="/article/<?php echo $manga->getId(); ?>">
                        <img class="card_img" src="<?= $manga->getImage(); ?>" alt="<?= $manga->getTitre(); ?>">
                    </a>
                    <div class="card_text">
                        <p style="font-weight: bold;"><?= strlen($manga->getTitre()) > 20 ? substr($manga->getTitre(),0,20)."..." : $manga->getTitre(); ?></p>
                        <p><?= $manga->getAuteur()->getNom() . " " . $manga->getAuteur()->getPrenom(); ?></p><br/>
                        <p style="font-size: larger;"><?= $manga->getPrix(); ?>€</p><br/>
                        <a class="add-to-cart-button" href="/addToCart?id=<?= $manga->getId(); ?>">
                            AJOUTER AU PANIER
                        </a>
                    </div>
                </article>


        <?php
            }
        }
        ?>
    </div>
    <div style="text-align: center">
        <a class="" style="margin: 10px" href="/outuveuxavantmonreuf">← Page precédente</a>
        <a class="" style="margin: 10px" href="/outuveuxapresmonreuf">Page suivante →</a>
    </div>
    <?php include './parts/footer.php'; ?>
</body>
</html>