<html lang="fr">
    <head>
       <?php
       include '../src/manager/Auth.php';
       $n = "Le Marche des Mangas - Login"; // Titre
       $content = "Le login"; // Description
       $image ="https://img.search.brave.com/H1k51jh7MoZP6ORpCXv7mD-vgVSQciaZIwBtoBkNrqg/rs:fit:400:400:1/g:ce/aHR0cHM6Ly9wYnMu/dHdpbWcuY29tL3By/b2ZpbGVfaW1hZ2Vz/LzE1NjM2OTU4ODIv/bG9nb19ibG9nXzQw/MHg0MDAucG5n"; // Image
       $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
       $footer = true;
       $header = true;
       $default = true;
       require "../parts/head.php";
       ?>
        <link rel="stylesheet" type="text/css" href="/public/css/styleAuthentification.css">
    </head>
    <body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form>
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="txt" placeholder="User name" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <button>Sign up</button>
            </form>
        </div>

        <div class="login">
            <form>
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <button>Login</button>
            </form>
        </div>
    </div>
    </body>
</html>
