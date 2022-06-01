<html lang="fr">

<head>
    <?php
    $n = "Panier"; // Titre
    $content = "Panier, résume de votre commande"; // Description
    $image = "/media/favicon.ico"; // Image
    $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
    require "./parts/head.php";
    if($auth->isLoggedIn() == false)
    {
        header('Location: /dashboard/authentification.php');
        exit();
    }elseif(count($session->getArticles()) == 0)
    {
        header('Location: /');
        exit();
    }
    ?>
</head>

<body style="background-color: lightgray;">
    <?php include "./parts/header.php"; ?>
    <span class="panierglobal">
        <div class="buy1">
            <h4 class="pan" style="font-family: 'Reggae One', cursive;"><strong>Panier</strong></h4>
            <div class="paniercart">
                <ul class="shopping-cart-items">
                    <?php
                    $mangaCart = $session->getArticles();

                    foreach ($mangaCart as $mangaInCart) {
                    ?>
                        <br />
                        <li class="clearfix">
                            <img src="<?= $mangaInCart->getManga()->getImage(); ?>" alt="<?= strlen($mangaInCart->getManga()->getTitre()) > 20 ? substr($mangaInCart->getManga()->getTitre(), 0, 20) : $mangaInCart->getManga()->getTitre(); ?>" width="50" height="75" />
                            <span class="item-name"><?= strlen($mangaInCart->getManga()->getTitre()) > 20 ? substr($mangaInCart->getManga()->getTitre(), 0, 20) . "..." : $mangaInCart->getManga()->getTitre(); ?></span>
                            <span class="item-price" style="font-weight: bold;"><?= number_format($mangaInCart->getManga()->getPrix() * $mangaInCart->getQuantite(), 2); ?> €</span>
                            <div class="item-quantity">Quantitée:  <?= $mangaInCart->getQuantite(); ?></div></br />
                            <a class="button" href="/removeFromCart?id=<?= $mangaInCart->getManga()->getId(); ?>">Retirer</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="buy">
            <article class="infoCommande">
                <div class="blockcom">
                    <h3 class="récap"><strong>Récapitulatif</strong></h3>
                    <br />
                    <p style="font-family: 'Reggae One', cursive;">Sous total : <?= number_format($session->getCartPrice(), 2); ?> €</p>
                    <br />
                    <p style="font-family: 'Reggae One', cursive;">Réduction : 0.00 €</p>
                    <br />
                </div>
                <br />
                <div class="totalblock">
                    <p style="font-family: 'Reggae One', cursive;">Total : <?= number_format($session->getCartPrice(), 2); ?> €</p>
                    <br />
                </div>
                <br />
                <button class="moula button" onclick="window.location.href='/Paiement'" style="font-family: 'Reggae One', cursive;">Paiement</button>
            </article>
            <img class="logodumillieu" src="media/logo-145.png" alt="logo" />
            <br />
            <br />
            <br />
        </div>
    </span>

    <?php include './parts/footer.php'; ?>
</body>

</html>