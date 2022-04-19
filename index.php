<html lang="fr">
    <head>
       <?php
       $n = "Le Marche des Mangas"; // Titre
       $content = "Mon super site "; // Description
       $image ="https://img.search.brave.com/H1k51jh7MoZP6ORpCXv7mD-vgVSQciaZIwBtoBkNrqg/rs:fit:400:400:1/g:ce/aHR0cHM6Ly9wYnMu/dHdpbWcuY29tL3By/b2ZpbGVfaW1hZ2Vz/LzE1NjM2OTU4ODIv/bG9nb19ibG9nXzQw/MHg0MDAucG5n"; // Image
       $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
       require "./parts/head.php"; 

       ?>
    </head>
    <body style="background-color: lightgray;">
        <?php include "./parts/header.php"; ?>
        <div class="cards">
    <?php
       $mangas = $auth->searchManga("");
        if(count($mangas) > 0){
           
            foreach($mangas as $manga){
              ?>
              <article class="card">
            <img class="card_img" src="<?= $manga->getImage(); ?>" alt="<?= $manga->getTitre(); ?>">
            <div class="card_text">
                <p style="font-weight: bold;"><?= $manga->getTitre(); ?></p><br/>
                <p> de <?= $manga->getAuteur()->getNom()." ".$manga->getAuteur()->getPrenom(); ?></p><br/>
                <p style="font-size: larger;"><?= $manga->getPrix(); ?>€</p><br/>
                <div class="button">
                    <p>AJOUTER AU PANIER</p>
                </div>
            </div>
        </article>
              <?php
            }
        } 
    ?>
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
        <?php include './parts/footer.php'; ?>
    </body>
</html>
