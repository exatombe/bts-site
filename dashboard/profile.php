<html lang="fr">
<head>
    <?php
    $n = "Profil"; // Titre
    $content = "Mon super profil privé"; // Description
    $image = "/media/favicon.ico"; // Image
    $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
    require $_SERVER['DOCUMENT_ROOT']."/parts/head.php";
    if ($auth->isLoggedIn() == false)
    {
        header('Location: /dashboard/authentification.php');
        exit();
    }
    ?>
    </head>
<body style="background-color: lightgray;">
<?php include $_SERVER['DOCUMENT_ROOT']."/parts/header.php"; ?>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<div class="messagemoncompte">
    <p>Bonjour <?php echo $auth->getUser()->getUsername(); ?> !</p>
</div>
<div>
    <?php 
        var_dump($auth->getCommands());
    ?>
</div>
<br/>
<div style ="width : 92vw;margin: auto;">
<table class="commandetablestyle">
    <thead>
    <tr>
        <th scope="col">
            commande
        </th>
        <th scope="col">
            statut du paiement
        </th>
        <th scope="col">
            total
        </th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td data-label="commande">
                #0001
            </td>
            <td data-label="statut du paiement">
                payé
            </td>
            <td data-label="total">
                10€ ta race
            </td>
        </tr>
    </tbody>
</table>
</div>


<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php'; ?>
</body>
</html>
