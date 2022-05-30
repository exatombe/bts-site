<html lang="fr">
    
<head>
    <?php
    $n = "Panier"; // Titre
    $content = "Panier, résume de votre commande"; // Description
    $image ="/media/favicon.ico"; // Image
    $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
    require "./parts/head.php";

    ?>
</head>

<body style="background-color: lightgray;">
<?php include "./parts/header.php"; ?>
<span class="panierglobal">
<div class="buy1">
<h4 class="pan" style="font-family: 'Reggae One', cursive;"><strong>Panier</strong></h4>
<ul class="panierproduits">
     <?php
        $mangaCart = $session->getArticles();
     
        foreach($mangaCart as $mangaInCart){
            ?>
            <hr style="height: 2px; background: grey;" />
      <li class="clearfix">
          <img src="<?= $mangaInCart->getManga()->getImage(); ?>" alt="<?= $mangaInCart->getManga()->getTitre(); ?>" width="50" height="75" />
          <span class="item-name"><?= $mangaInCart->getManga()->getTitre(); ?></span>
          <span class="item-price" style="font-weight: bold;"><?= number_format($mangaInCart->getManga()->getPrix()* $mangaInCart->getQuantite(),2); ?> €</span>
          <div class="item-quantity">Quantity: <?= $mangaInCart->getQuantite(); ?></div>
      </li>
      <?php
        }
        ?>
    </ul>
</div>
<div class="buy">
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
		<p style="font-family: 'Reggae One', cursive;">Total :  <?= number_format($session->getCartPrice(),2); ?> €</p>
		<br />
	</div>
	<br />
	<button class="moula button" onclick="window.location.href='/Paiement'" style="font-family: 'Reggae One', cursive;">Paiement</button>
</article>
<img class="logodumillieu" src="media/logo-145.png" alt="logo" />
<br/>
<br />
<br />
</div>
</span>

<?php include './parts/footer.php'; ?>
</body>
</html>