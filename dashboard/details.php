<html lang="fr">
<head>
    <?php
    $n = "Details"; // Titre
    $content = "Mon super profil privé"; // Description
    $image = "/media/favicon.ico"; // Image
    $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
    require $_SERVER['DOCUMENT_ROOT']."/parts/head.php";
    $currentCommandes = [];
    if ($auth->isLoggedIn() == false)
    {
        header('Location: /dashboard/authentification');
        exit();
    }else{
        if(isset($_GET['id'])){
           // check if key exists in the array
           $commandsList = $auth->getCommands();
            if(array_key_exists($_GET['id'], $commandsList )){
                           $currentCommandes =  $commandsList[$_GET['id']];
            }else{
                header('Location: /dashboard/profile');
                exit();
            }
         
        }else{
            header('Location: /dashboard/profile');
            exit();
        }
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
    <p>Détails de la commande : <?php echo $_GET['id']; ?> !</p>
</div>
<br/>
<div style ="width : 92vw;margin: auto;">
<table class="commandetablestyle">
    <thead>
    <tr>
        <th scope="col">
            article
        </th>
        <th scope="col">
            quantité
        </th>
        <th scope="col">
            prix unitaire
        </th>
        <th scope="col">
            prix total
        </th>
    </tr>
    </thead>
    <tbody>
        <?php
            foreach($currentCommandes as $articles){
                echo '<tr>';
                echo '<td data-label="article"><a style="color:blue" href="/article/'.$articles->getManga()->getId().'">'.$articles->getManga()->getTitre().'</a></td>';
                echo '<td data-label="quantité">'.$articles->getQuantite().'</td>';
                echo '<td data-label="prix unitaire">'.$articles->getManga()->getPrix().'€</td>';
                echo '<td data-label="prix total">'.$articles->getManga()->getPrix()*$articles->getQuantite().'€</td>';
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
