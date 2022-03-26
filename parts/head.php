<?php
    if(isset($content) && isset($n) && isset($key) && isset($image)){
    include $_SERVER['DOCUMENT_ROOT'].'/src/manager/Auth.php';
    session_start();
?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content="<?php echo $content; ?>"/>
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="application-name" content="AnimeHub" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-title" content="AnimeHub" />
        <meta property="og:title" content="<?php echo $n; ?>" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="AnimeHub" />
        <meta name="keywords" content="<?php echo $key; ?>" />
        <meta property="og:url" content="https://animehub.world-heberg.com/" />
        <meta property="og:image" content="<?php echo $image; ?>" />
        <meta property="og:description" content="<?php echo $content; ?>"/>
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:site" content="@diamondeagle8" />
        <meta name="twitter:title" content="<?php echo $n; ?>" />
        <meta name="twitter:description" content= "<?php echo $content; ?>" />
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <!-- Le meta magique pour les appareils mobiles :)-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=4">
        <meta name="robots" content="index, follow">
        <meta name="theme-color" content="#1a1a1a"/>
        <link rel="icon" type="image/png" sizes="64x64" href="https://bot-creator.com/favicon-64.png">
        <title><?php echo $n; ?></title>

<!-- Font Awesome -->
        <?php if(!isset($default)){ ?>
            <link rel="stylesheet" type="text/css" href="/public/css/style.css">
        <?php } ?>

        <?php if(!isset($footer)){ ?>
            <link rel="stylesheet" type="text/css" href="/public/css/styleFooter.css">
       <?php } ?>
        <?php if(!isset($header)){ ?>
            <link rel="stylesheet" type="text/css" href="/public/css/header.css">
            <link rel="stylesheet" type="text/css" href="/public/css/reset.min.css">
        <?php } ?>

        
        <link rel="stylesheet" type="text/css" href="/public/css/style_global.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
<!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,600&family=Nunito&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/0c8f4b5f9b.js" crossorigin="anonymous"></script>
<?php
    }
    ?>
