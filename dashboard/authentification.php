<html lang="fr">
    <head>
       <?php
       $n = "Le Marche des Mangas - Login"; // Titre
       $content = "Le login"; // Description
       $image ="https://img.search.brave.com/H1k51jh7MoZP6ORpCXv7mD-vgVSQciaZIwBtoBkNrqg/rs:fit:400:400:1/g:ce/aHR0cHM6Ly9wYnMu/dHdpbWcuY29tL3By/b2ZpbGVfaW1hZ2Vz/LzE1NjM2OTU4ODIv/bG9nb19ibG9nXzQw/MHg0MDAucG5n"; // Image
       $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
       $footer = true;
       $header = true;
       require "../parts/head.php"; 

       ?>
    </head>
    <body style="background-color: lightgray;">
    <img src="http://<?= $_SERVER['SERVER_NAME']; ?>/media/favicon-64.png" alt="logo" />
    <div class="boitelogin2">
        <h4 class="h42"><strong><u>Créer un compte</u></strong></h4>
        <p class="mini2">Saisissez un email, un pseudo et un mot de passe</p>
        <div class="Compte2">
        <label for="e-mail">Email</label>
        <input type="email" name="e-mail" id="e-mail">
        </div>
        <div class="Pseudoo">
        <label for="Pseudo">Nom Utilisateur</label>
        <input type="text" name="pseudo" id="Pseudo">
        </div>
        <div class="mddp2">
        <label for="mdp">Mot de passe</label>
        <input type="text" name="mdp" id="mdp">
        </div>
        <div class="Cmddp">
        <label for="cmddp">Confirmation mot de passe</label>
        <input type="password" name="cmddp" id="cmddp">
        </div>
        <span class="bouton2">
        <button onclick="verify" style="border: none; background-color: #587EF2;">Se connecter !</button>
        </span>
    </div>

    <div class="boitelogin">
        <h4><strong><u>Connexion</u></strong></h4>
        <p class="mini">Saisissez votre e-mail et votre mot de passe pour vous connecter</p>
        <div class="Compte">
        <label for="e-mail">Email</label>
        <input type="email" name="e-mail" id="e-mail">
        </div>
        <div class="mddp">
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">
        </div>
        <span class="bouton">
        <button onclick="verify" style="border: none; background-color: #587EF2;">Se connecter !</button>
        </span>
    </div>
    </body>
</html>
