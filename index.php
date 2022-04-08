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
        <?php 
            $em = new EntityRepository();
            $auteur = $em->findOneBy("auteur",["Nom" => "Hiro"]);
            $artiste = $em->findOneBy("artiste",["Nom" => "Hiro"]);
            $manga = new Manga();
            $manga->setTitre("Fairy Tail Tome 4");
            $manga->setAuteur(new Auteur($auteur["ID_AUTEUR"]));
            $manga->setArtiste(new Artiste($artiste["ID_ARTISTE"]));
            $manga->setEditeur("Hachette");
            $manga->setPrix(10);
            $manga->setFormat("Poche");
            $manga->setGenre("Action");
            $manga->setIsbn("978-2-84599-987-9");
            $manga->setSynopsis("J'aime les pates");
            $manga->setImage("fairytail.jpg");
            $em->insert($manga);
        ?>
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
