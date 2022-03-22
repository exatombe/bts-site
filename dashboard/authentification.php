<html lang="fr">
    <head>
       <?php
       $n = "Le Marche des Mangas - Login"; // Titre
       $content = "Le login"; // Description
       $image ="https://img.search.brave.com/H1k51jh7MoZP6ORpCXv7mD-vgVSQciaZIwBtoBkNrqg/rs:fit:400:400:1/g:ce/aHR0cHM6Ly9wYnMu/dHdpbWcuY29tL3By/b2ZpbGVfaW1hZ2Vz/LzE1NjM2OTU4ODIv/bG9nb19ibG9nXzQw/MHg0MDAucG5n"; // Image
       $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
       require "../parts/head.php"; 

       ?>
    </head>
    <body style="background-color: lightgray;">
    <img src="http://<?= $_SERVER['SERVER_NAME']; ?>/media/favicon-64.png" alt="logo" />
    <div class="boitelogin">
        <h4><strong><u>Connexion ou inscription</u></strong></h4>
        <p class="mini">Saisissez votre e-mail pour vous connecter ou créer un compte</p>
        <div class="Pseudonyme">
        <label for="e-mail">Email</label>
        <input type="email" name="e-mail" id="e-mail">
        </div>
        <span class="bouton">
        <button onclick="verify" style="border: none; background-color: #587EF2;">Se connecter / S'inscrire</button>
        </span>
    </div>
    </body>
</html>
