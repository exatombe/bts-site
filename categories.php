<html lang="fr">
<head>
    <?php
    $title = "";
    if(isset($_GET["id"])){
        if($_GET["id"] == "shojo"){
            $title = "Shojo";
        }
        else if($_GET["id"] == "seinen"){
            $title = "Seinen";
        }
        else if($_GET["id"] == "shonen"){
            $title = "Shonen";
        }
    }else{
        header("Location: /");
    }
    $n = $title." - Le Marche des Mangas"; // Titre
    $content = "Mon super site "; // Description
    $image ="/media/favicon.ico"; // Image
    $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
    require "./parts/head.php";

    ?>
</head>
<body style="background-color: lightgray;">
<?php include "./parts/header.php"; ?>

<div class="cards">
<?php

$mangas = $auth->findBy("manga",["Genre" => $title]);


function makeMangaFromArray($value)
{
    return (new EntityRepository)->select(new Manga($value["ID_MANGA"]));
}
$mangas = array_map("makeMangaFromArray",$mangas);

if (count($mangas) > 0) {
    foreach ($mangas as $manga) {
        ?>
        <article class="card">
            <a href="/article/<?php echo $manga->getId(); ?>">
                <img class="card_img" src="<?= $manga->getImage(); ?>" alt="<?= $manga->getTitre(); ?>">
            </a>
            <div class="card_text">
                <p style="font-weight: bold;"><?= strlen($manga->getTitre()) > 20 ? substr($manga->getTitre(),0,20)."..." : $manga->getTitre(); ?></p><br />
                <p> de <?= $manga->getAuteur()->getNom() . " " . $manga->getAuteur()->getPrenom(); ?></p><br />
                <p style="font-size: larger;"><?= $manga->getPrix(); ?>€</p><br />
                <a class="button" href="/addToCart?id=<?= $manga->getId(); ?>">
                    AJOUTER AU PANIER
                </a>
            </div>
        </article>

        <?php
    }
}
?>
</div>

<?php include './parts/footer.php'; ?>
</body>
</html>