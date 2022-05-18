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
        <?php
        function getTotalFromCommand($command)
        {
            $total = 0;
            foreach ($command as $article)
            {
                $total += $article->getManga()->getPrix() * $article->getQuantite();
            }
            return $total;
        }
        foreach($auth->getCommands() as $key => $value)
        {
            echo '<tr>';
            echo '<td data-label="commande"><a style="color:blue" href="/dashboard/details?id='.$key.'">#'.$key.'</td>';
            echo '<td data-label="statut du paiement">Payé</td>';
            echo '<td data-label="total">'.getTotalFromCommand($value).'€</td>';
            echo '</tr>';
        }
        ?>
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
