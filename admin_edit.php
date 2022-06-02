<html lang="fr">

<head>
    <?php
    $n = "Le Marche des Mangas"; // Titre
    $content = "Mon super site "; // Description
    $image = "/media/favicon.ico"; // Image
    $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
    require "./parts/head.php";
    if ($auth->isLoggedIn()) {
        $email = $auth->getUser()->getEmail();
        if($email !== "admin@admin.fr"){
            header("Location: /");
        }
    } else {
        header("Location: /");
    }
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
                    <p style="font-weight: bold;"><?= $manga->getTitre(); ?></p><br />
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

            function searchArtiste(string $name): array
            {
                function makeArrayOfClassFromValues3($value)
                {
                    return (new EntityRepository)->select(new Artiste($value["ID_ARTISTE"]));
                }
                $name = htmlspecialchars($name);
                $searchValues = (new EntityRepository)->query("SELECT * FROM artiste WHERE Nom LIKE '%$name%' OR Prenom LIKE '%$name%'");
                if($searchValues->rowCount() > 0){
                    $searchValues = $searchValues->fetchAll();
                    return array_map("makeArrayOfClassFromValues3",$searchValues);
                }else{
                    return [];
                }
            }
    ?>
</div>
<?php include './parts/footer.php'; ?>
</body>

</html>