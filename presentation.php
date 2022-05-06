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
<h3 class="titleH3">Par des weebs pour des weebs</h3>
<h5 class="explicationh5">Passionnés de manga depuis l'âge de raison, notre équipe s'est concerté pour créer 
    un service en ligne capable de répondre au attente en matière de manga papier du marché.
    Du shônen en passant par le seinen, du shojo au hentai nous possédons un grand nombre de genre
    et de licence pour tous et pour toutes.</h5>
<br />
<br />
<br />
<div class="imgbox">
    <img class="jerem" src="media/jeremy.jpg" alt="un mec moche à lunette" />
    <img class="maths" src="media/matteo.jpg" alt="un mec moche mais qui est fort en maths" />
    <img class="vad" src="media/vadim.jpg" alt="un mec moche asiatique" />
    <img class="moi" src="media/tristan.jpg" alt="un mec moche et c'est tout" />
</div>

<div class="textimgbox1">
    <span class="textimgboxcss">
    <p style="font-size: larger;">Jeremy Soler</p> <br />
    <p>Chef de projet, amateur de loli depuis 2003, "FaitTout" man</p> <br />
    <p>« J'ai une super idée faudra juste changer tou... Mathéo pose ce couteau »</p>
    </span>
</div>
<div class="textimgbox2">
    <span class="textimgboxcss">
    <p style="font-size: larger;">Mathéo Saiter</p> <br />
    <p>Pro en maths, a mis des centaines de chinois au chômage</p> <br />
    <p>« Jeremy tu fais chier »</p>
    </span>
</div>
<div class="textimgbox3">
    <span class="textimgboxcss">
    <p style="font-size: larger;">Vadim Glavieux</p> <br />
    <p>Homme de culture</p> <br />
    <p>« j'ai fais le back mais j'ai rien compris »</p>
    </span>
</div>
<div class="textimgbox4">
    <span class="textimgboxcss">
    <p style="font-size: larger;">Tristan Tran</p> <br />
    <p>Asiatique</p> <br />
    <p>« Brûlez moi celui qui a niqué le css. Ha c'est moi  »</p>
    </span>
</div>
<?php include './parts/footer.php'; ?>
</body>
</html>