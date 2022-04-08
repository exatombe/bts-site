<html lang="fr">

<head>
    <?php
    $n = "Le Marche des Mangas - Login"; // Titre
    $content = "Le login"; // Description
    $image = "https://img.search.brave.com/H1k51jh7MoZP6ORpCXv7mD-vgVSQciaZIwBtoBkNrqg/rs:fit:400:400:1/g:ce/aHR0cHM6Ly9wYnMu/dHdpbWcuY29tL3By/b2ZpbGVfaW1hZ2Vz/LzE1NjM2OTU4ODIv/bG9nb19ibG9nXzQw/MHg0MDAucG5n"; // Image
    $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
    $footer = true;
    $header = true;
    $default = true;
    require "../parts/head.php";
    if (isset($_SESSION['user'])) {
        header('Location: ../index.php');
    }
    if(isset($_GET["action"]) == "logout"){
        $_SESSION["user"] = null;
        header('Location: ../index.php');
    }

    ?>
    <link rel="stylesheet" type="text/css" href="/public/css/styleAuthentification.css">
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="POST">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="hidden" name="signup" value="submit">
                <input type="text" name="username" placeholder="Username" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <input type="password" name="confirmPass" placeholder="Password" required="">
                <?php
                if (isset($_POST['signup'])) {
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $confirmPass = $_POST['confirmPass'];
                    $auth->Register($email, $username, $password, $confirmPass);
                    if ($auth->getError()) {
                        echo '<div class="alert alert-danger" role="alert">' . $auth->getError() . '</div>';
                    } else {
                        $_SESSION['user'] = $auth->getUser();
                        echo '<div class="alert alert-success" role="alert">' . $auth->getSuccess() . '</div>';
                        echo '<script>setTimeout(function(){window.location.href="../index.php"},2000);</script>';
                    }
                }
                ?>
                <button>Sign up</button>
            </form>
        </div>

        <div class="login">
            <form method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="hidden" name="login" value="submit">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button>Login</button>
                <?php
                if (isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $auth->Login($email, $password);
                    if ($auth->getError()) {
                        echo '<div class="alert alert-danger" role="alert">' . $auth->getError() . '</div>';
                    } else {
                        echo '<div class="alert alert-success" role="alert">' . $auth->getSuccess() . '</div>';
                        $_SESSION['user'] = $auth->getUser();
                        header("Location: ../index.php");
                    }
                }

                ?>
            </form>
        </div>
    </div>
</body>

</html>