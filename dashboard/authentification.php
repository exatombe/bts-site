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
        header('Location: ../');
    }
    if(isset($_GET["action"]) == "logout"){
        $_SESSION["user"] = null;
        $_SESSION["articles"]= null;
        header('Location: ../');
    }

    ?>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/styleAuthentification.css">
</head>

<body>
<div id="pageMessages">

</div>

    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <form method="POST" enctype="multipart/form-data">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="hidden" name="signup" value="submit">
                <input type="text" name="username" placeholder="Username" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" id="passwd" placeholder="Password" required="">
                <input type="password" name="confirmPass" id="passwd2" placeholder="Password" required="">
                <button onclick="fillPassword()" type="button">Fill password</button>
                <input type="file" name="picture_user" placeholder="photo" required="">
                <?php
                if (isset($_POST['signup'])) {
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $confirmPass = $_POST['confirmPass'];
                    $auth->Register($email, $username, $password, $confirmPass, $_FILES['picture_user']);
                    if ($auth->getError()) 
                    {
                    
                     ?>
                     <script src="../public/js/Alert.js"></script>
                     <script> createAlert('Oups!','Something went wrong','<?= $auth->getError();?>','danger',false,true,'pageMessages') </script>
                   <?php
                    } else {
                        $_SESSION['user'] = $auth->getUser();
                        ?>
                        <script src="../public/js/Alert.js"></script>
                        <script> createAlert('Success!','Wait 3 seconds before you get to the main page...','<?= $auth->getSuccess();?>','success',false,true,'pageMessages') </script>
                      <?php
                        echo '<script>setTimeout(function(){window.location.href="../index.php"},3000);</script>';
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
                        ?>
                        <script src="../public/js/Alert.js"></script>
                        <script> createAlert('Oups!','Something went wrong','<?= $auth->getError();?>','danger',false,true,'pageMessages') </script>
                      <?php
                    } else {
                        $_SESSION['user'] = $auth->getUser();
                        ?>
                        <script src="../public/js/Alert.js"></script>
                        <script> createAlert('Success!','Wait 3 seconds before you get to the main page...','<?= $auth->getSuccess();?>','success',false,true,'pageMessages') </script>
                      <?php
                        echo '<script>setTimeout(function(){window.location.href="../index.php"},3000);</script>';
                    }
                }

                ?>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        let pwd = document.getElementById("passwd"),
            pwd2 = document.getElementById("passwd2");

      // make a function to gen a password with a length of 8 characters,
        // with at least one number, one uppercase and one lowercase letter and one special character
        // and not three of the same character in a row
        function generatePassword() {
            let length = 8,
                charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+",
                retVal = "";
            for (let i = 0, n = charset.length; i < length; ++i) {
                var randomNumber = Math.floor(Math.random() * charset.length);
                retVal += charset.substring(randomNumber, randomNumber +1);
            }
            // check if the password has 3 consecutive characters and if it does, generate a new one
            // check if the password contains one number, one uppercase and one lowercase letter and one special character
            // and if it doesn't, generate a new one
            if (retVal.match(/(.)\1\1/g) || !retVal.match(/[0-9]/g) || !retVal.match(/[A-Z]/g) || !retVal.match(/[a-z]/g) || !retVal.match(/[!@#$%^&*()_+]/g)) {
                return generatePassword();
            } else {
                return retVal;
            }
        }
       
        // make a function to fill the password field with a generated password
        function fillPassword() {
            let passwordCurrent = generatePassword();
            pwd.value = passwordCurrent;
            pwd2.value = passwordCurrent;
        }
    </script>
</body>

</html>