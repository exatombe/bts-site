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
<br />
<br />
<br />
<br />
<div class="blockpay">
<h3 class="payt">Payez en toute sécurité</h3>
<br />
<h4 class="paytt">Les cartes bancaires éligibles pour le paiement de votre commande sont : CB, Visa, MasterCard, Amex, e-CB, Maestro</h4>
<br />
<br />
<br />
<form method="post" action="">
    <p>
            <label for="NumCarte">Numéro de carte :</label> <br />
            <br />
            <input style="padding: 12px;" type="text" name="NumCarte" id="NumCarte" placeholder="1234 0000 0000 0000" size="40" maxlength="10" /> <br />
            <br />
            <br />
        <span class="formul">
            <span class="block2">
            <label for="NumCarte">Date d'expiration (MM/AA):</label>
            <input class="blockimput" type="text" name="NumCarte" id="NumCarte" placeholder="MM / AA" size="40" maxlength="10" />
            </span>
            <span class="block2">
            <label for="NumCarte">Code de sécurité (3 ou 4 chiffres) :</label>
            <input class="blockimput" type="text" name="NumCarte" id="NumCarte" placeholder="000" size="40" maxlength="10" />
            </span>
        </span>
    </p>
</form>
<button class="moulaa" style="font-family: 'Reggae One', cursive;"><a href="Paiement.php" style="color: white;">Valider et payer</a></button>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br/>
<?php include './parts/footer.php'; ?>
</body>
</html>