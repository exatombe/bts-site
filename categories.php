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

<a class="button" href="http://manga/categorie_seinen" >
    Seinen
</a>
</br>
</br>
</br>
<a class="button" href="http://manga/categorie_shojo" >
    Shojo
</a>
</br>
</br>
</br>
<a class="button" href="http://manga/categorie_shonen" >
    Shonen
</a>


<?php include './parts/footer.php'; ?>
</body>
</html>