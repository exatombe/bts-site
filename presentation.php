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


<div class="container-box">
  <div class="card-box">
    <img  src="/media/jeremy.jpg" alt="un mec moche à lunette" class="card_box_image">
    <p class="card_box_name">Jeremy Soler</p>
    <div class="sub_card_name">
        Chef de projet, amateur de loli depuis 2003, "FaitTout" man
    </div>
    <ul class="social-icons">
      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
      <li><a href="#"><i class="fa fa-codepen"></i></a></li>
    </ul>
    <p>« J'ai une super idée faudra juste changer tou... Mathéo pose ce couteau »</p>
  </div>
  <div class="card-box">
    <img  src="/media/matteo.jpg" alt="un mec moche mais qui est fort en maths" class="card_box_image">
    <p class="card_box_name">Mathéo Saiter</p>
    <div class="sub_card_name">
        Pro en maths, a mis des centaines de chinois au chômage
    </div>
    <ul class="social-icons">
      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
      <li><a href="#"><i class="fa fa-codepen"></i></a></li>
    </ul>
    <p>« Jeremy tu fais chier »</p>
  </div>
  <div class="card-box">
    <img  src="media/vadim.jpg" alt="un mec moche asiatique" class="card_box_image">
    <p class="card_box_name">Vadim Glavieux</p>
    <div class="sub_card_name">
        Homme de culture
    </div>
    <ul class="social-icons">
      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
      <li><a href="#"><i class="fa fa-codepen"></i></a></li>
    </ul>
    <p>« j'ai fais le back mais j'ai rien compris »</p>
  </div>
  <div class="card-box">
    <img src="media/tristan.jpg" alt="un mec moche et c'est tout"  class="card_box_image">
    <p class="card_box_name">Tristan Tran</p>
    <div class="sub_card_name">
        Asiatique
    </div>
    <ul class="social-icons">
      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
      <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
      <li><a href="#"><i class="fa fa-codepen"></i></a></li>
    </ul>
    <p>« Brûlez moi celui qui a niqué le css. Ha c'est moi  »</p>
  </div>
</div>




<?php include './parts/footer.php'; ?>
</body>
</html>