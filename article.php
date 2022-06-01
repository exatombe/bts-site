<html lang="fr">
    <head>
        <?php
        $n = "Le Marche des Mangas"; // Titre
        $content = "Mon super site "; // Description
        $image ="/media/favicon.ico"; // Image
        $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
        require "./parts/head.php";
        $mangarticle = "";
        if(isset($_GET['id'])){
        
          $mangarticle = (new EntityRepository)->select(new Manga(intval($_GET['id'])));
          if(!$mangarticle){
            header('Location: /');
            exit();
          }
        }else{
            header("Location: /");
        }
        ?>

    </head>
    <body style="background-color: lightgray;">
        <?php include "./parts/header.php"; ?>
        <div class="article">
            <div class="article_part">
                <img class="article_img" src="<?= $mangarticle->getImage(); ?>">
                <div class="article_desc">
                    <p class="article_titre"><?= $mangarticle->getTitre(); ?></p><br/>
                    <div class="article_infos">
                        <div class="article_createurs">
                            Auteur: <?= $mangarticle->getAuteur()->getNom() . " " . $mangarticle->getAuteur()->getPrenom(); ?>
                            <br/><br/>
                            Artiste: <?= $mangarticle->getArtiste()->getNom() . " " . $mangarticle->getArtiste()->getPrenom(); ?>
                        </div>
                        <div class="article_prix">
                            <?= number_format($mangarticle->getPrix(),2); ?>€
                        </div>
                    </div>
                    <div class="article_bouton">
                    <a class="article_ajout_panier" href="/addToCart?id=<?= $mangarticle->getId(); ?>">AJOUTER AU PANIER</a>
                    </div>
                </div>
            </div>
            <div class="article_synopsis">
                <p style="font-weight: bold"> Résumé: </p>
                <br/>
                <p style="margin: 2% 5%"> <?= $mangarticle->getSynopsis(); ?> </p>
            </div>
            <br/>
            <div class="article_tableau">
                <p style="font-weight: bold;text-align: left">Caractéristiques: </p>
                <br/><br/>
                <div class="article_caracteristique"> Éditeur : <?= $mangarticle->getEditeur();  ?> </div>
                <div class="article_caracteristique"> ISBN : <?= $mangarticle->getIsbn(); ?> </div>
                <div class="article_caracteristique"> Genre : <?= $mangarticle->getGenre(); ?> </div>
                <div class="article_caracteristique"> Format : <?= $mangarticle->getFormat(); ?></div>
            </div>
        </div>

        <?php include './parts/footer.php'; ?>
    </body>
</html>
