<html lang="fr">
<head>
    <?php
    $n = "Le Marche des Mangas"; // Titre
    $content = "Mon super site "; // Description
    $image ="/media/favicon.ico"; // Image
    $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
    require "./parts/head.php";

    ?>
</head>
<body style="background-color: lightgray;">
<?php include "./parts/header.php"; ?>

<div class="cards">
    <?php for($i = 0; $i<15; $i++){ ?>
        <article class="card">
            <img class="card_img" src="https://images-na.ssl-images-amazon.com/images/I/91B0dwAjhcL.jpg" alt="Fairy Tail - Tome 1">
            <div class="card_text">
                <p> Fairy Tail - Tome 1 </p><br/>
                <p> de Hiro Mashima</p><br/>
                <p>3€</p><br/>
                <div class="button">
                    <p>AJOUTER AU PANIER</p>
                </div>
            </div>
        </article>
    <?php } ?>
</div>


<?php include './parts/footer.php'; ?>
</body>
</html>
