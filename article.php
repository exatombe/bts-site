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

        <div class="article">
            <div class="article_part1">
                <img class="article_img" src="/media/cover/Fairy%20Tail%20-%20Tome%201.jpg">
                <div class="article_vligne"></div>
                <div class="article_infos">
                    <p class="article_titre">Fairy Tail - Tome 1</p><br/>
                    Auteur:"AUTEUR"
                    Artiste:"ARTISTE"
                    Prix:"PRIX"
                </div>
            </div>
            <div class="article_synopsis">
                <p style="font-weight: bold">
                    Résumé:
                </p><br/>
                Les guildes magiques sont des associations. Elles proposent différentes tâches aux magiciens, allant de la recherche d'un objet à l'attaque en règle. Lucy, une jeune fille, rêve de devenir magicienne. Un jour, elle rencontre Natsu, un magicien maîtrisant le feu, ce dernier l'invite alors à rejoindre sa guilde. Il s'agit de la célèbre Fairy Tail, le sujet de tous les rêves de Lucy. Mais celle-ci est bien mystérieuse et semble être à l'origine de nombreux scandales.
            </div>
            <div class="article_tableau">
                <p style="font-weight: bold">Caractéristiques: </p><br/>
                <table>
                    <tr>
                        <td class="article_td">ISBN:</td><td>12345678900</td>
                    </tr>
                    <tr>
                        <td class="article_td">ISBN:</td><td>12345678900</td>
                    </tr>
                </table>
            </div>
        </div>

        <?php include './parts/footer.php'; ?>
    </body>
</html>
