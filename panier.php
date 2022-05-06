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
<div class="buy">
<h4 class="pan" style="font-family: 'Reggae One', cursive;"><strong>Panier</strong></h4>
<br/>
<ul class="shopping-cart-items" style="max-width:500px;">
     <?php
        $mangaCart = $session->getArticles();
        foreach($mangaCart as $mangaInCart){
            ?>
            <hr style="height: 2px; background: grey;" />
      <li class="clearfix">
          <img src="<?= $mangaInCart->getImage(); ?>" alt="<?= $mangaInCart->getTitre(); ?>" width="50" height="75" />
          <span class="item-name"><?= $mangaInCart->getTitre(); ?></span>
          <span class="item-price" style="font-weight: bold;"><?= number_format($mangaInCart->getPrix(),2); ?> €</span>
          <div class="item-quantity">Quantity: 01</div>
      </li>
      <?php
        }
        ?>
    </ul>
<article class="infoCommande">
	<div class="blockcom">
		<h3 class="récap"><strong>Récapitulatif</strong></h3>
		<br />
		<p style="font-family: 'Reggae One', cursive;">Sous total : <?= number_format($session->getCartPrice(),2); ?> €</p>
		<br />
		<p style="font-family: 'Reggae One', cursive;">Réduction : 0.00 €</p>
		<br />
	</div>
	<br />
	<div class="totalblock">
		<p style="font-family: 'Reggae One', cursive;">Total : <?= $session->getCartPrice(); ?> €</p>
		<br />
	</div>
	<br />
	<button class="moula" style="font-family: 'Reggae One', cursive;">Paiement</button>
</article>
</div>

<br />
<br />
<br />
<br />
<br />
<br />
<?php include './parts/footer.php'; ?>
</body>
</html>