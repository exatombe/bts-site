<html lang="fr">
<head>
    <?php
    $n = "Le Marche des Mangas"; // Titre
    $content = "Mon super site "; // Description
    $image = "https://img.search.brave.com/H1k51jh7MoZP6ORpCXv7mD-vgVSQciaZIwBtoBkNrqg/rs:fit:400:400:1/g:ce/aHR0cHM6Ly9wYnMu/dHdpbWcuY29tL3By/b2ZpbGVfaW1hZ2Vz/LzE1NjM2OTU4ODIv/bG9nb19ibG9nXzQw/MHg0MDAucG5n"; // Image
    $key = "manga, scan, shop, e-commerce, one piece, naruto"; // Mots clé
    require "./parts/head.php";
    if ($auth->isLoggedIn()) {
        $email = $auth->getUser()->getEmail();
        if($email !== "admin@admin.fr"){
            header("Location: /");
        }
    } else {
        header("Location: /");
    }
    if(isset($_POST["form_name"])){
        $form_name = $_POST["form_name"];
        switch($form_name){
            case "manga":
                if(isset($_POST["titre"]) && isset($_POST["prix"]) && isset($_POST["editeur"]) && isset($_POST["synopsis"]) && isset($_POST["format"]) && isset($_POST["isbn"]) && isset($_POST["image"]) && isset($_POST["genre"]) && isset($_POST["auteur"]) && isset($_POST["artiste"])){
                    $titre = htmlspecialchars($_POST["titre"]);
                    $prix = intval($_POST["prix"]);
                    $editeur = htmlspecialchars($_POST["editeur"]);
                    $synopsis = htmlspecialchars($_POST["synopsis"]);
                    $format = htmlspecialchars($_POST["format"]);
                    $isbn = htmlspecialchars($_POST["isbn"]);
                    $image = htmlspecialchars($_POST["image"]);
                    $genre = htmlspecialchars($_POST["genre"]);
                    $auteur = $auth->select(new Auteur(intval($_POST["auteur"])));
                    $artiste = $auth->select(new Artiste(intval($_POST["artiste"])));
                    $manga = new Manga(0,$titre, $prix, $editeur, $genre, $synopsis, $format, $isbn, $image, $auteur, $artiste);
                    $auth->insert($manga);
                    $auth->setSuccess("Le manga a bien été ajouté");
                }else{
                    $auth->setError("Tous les champs sont obligatoires");
                }
            break;
            case "auteur":
                if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["genre"]) && isset($_POST["nationalite"])){
                    $nom = htmlspecialchars($_POST["nom"]);
                    $prenom = htmlspecialchars($_POST["prenom"]);
                    $genre = htmlspecialchars($_POST["genre"]);
                    $nationalite = htmlspecialchars($_POST["nationalite"]);
                    $auteur = new Auteur(0,$nom, $prenom, $genre, $nationalite);
                    $auth->insert($auteur);
                    $auth->setSuccess("L'auteur a bien été ajouté");
                }else{
                    $auth->setError("Tous les champs sont obligatoires");
                }
            break;
            case "artiste":
                if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["genre"]) && isset($_POST["nationalite"])){
                    $nom = htmlspecialchars($_POST["nom"]);
                    $prenom = htmlspecialchars($_POST["prenom"]);
                    $genre = htmlspecialchars($_POST["genre"]);
                    $nationalite = htmlspecialchars($_POST["nationalite"]);
                    $artiste = new Artiste(0,$nom, $prenom, $genre, $nationalite);
                    $auth->insert($artiste);
                    $auth->setSuccess("L'artiste a bien été ajouté");
                }else{
                    $auth->setError("Tous les champs sont obligatoires");
                }
            break;
        }
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
</head>
<body style="background-color: lightgray;">
<?php include "./parts/header.php"; ?>
<div id="pageMessages">

</div>
<div class="container">
    <div class="row align-items-start">
        <div class="col mb-3">
            <h3>Auteur</h3>
            <form method="post">
                <input type="hidden" name="form_name" value="auteur" />
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nom</label>
                    <input class="form-control" name="nom"  />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Prénom</label>
                    <input class="form-control" name="prenom"  />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Genre</label>
                    <input class="form-control" name="genre" list="dataListNationnaliteAuteur" placeholder="Type to search...">
                    <datalist id="dataListNationnaliteAuteur">
                        <option value="Homme">
                        <option value="Femme">
                        <option value="Autre">
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nationalité</label>
                    <input class="form-control" name="nationalite"  />
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Ajouter Auteur</button>
                </div>
            </form>
        </div>
        <div class="col mb-3">
            <div class="col mb-3">
                <h3>Artiste</h3>
                <form method="post">
                    <input type="hidden" name="form_name" value="artiste" />
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nom</label>
                    <input class="form-control" name="nom"  />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Prénom</label>
                    <input class="form-control" name="prenom"  />
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Genre</label>
                    <input class="form-control" name="genre" list="dataListNationnaliteArtiste" placeholder="Type to search...">
                    <datalist id="dataListNationnaliteArtiste">
                        <option value="Homme">
                        <option value="Femme">
                        <option value="Autre">
                    </datalist>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Nationalité</label>
                    <input class="form-control" name="nationalite"  />
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Ajouter artiste</button>
                </div>
                </form>
            </div>
        </div>
        </div>
    <div class="row align-items-start">
        <div class="col mb-3">
                <h3>Manga</h3>
                <form method="post">
                    <input type="hidden" name="form_name" value="manga" />
                    <div class="row align-items-start">
                    <div class="col mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Titre</label>
                        <input class="form-control" name="titre"  />
                    </div>
                    <div class="col mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Prix</label>
                        <input class="form-control"  type="number" name="prix" min="3" step="0.01" />
                    </div>

                    <div class="col mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Editeur</label>
                        <input class="form-control" name="editeur"  />
                    </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Synopsis</label>
                        <textarea class="form-control" name="synopsis" rows="3"></textarea>
                    </div>
                    <div class="row align-items-start">
                    <div class="col mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Format</label>
                        <input class="form-control"  name="format" />
                    </div>
                    <div class="col mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">ISBN</label>
                        <input class="form-control"  name="isbn" />
                    </div>
                    <div class="col mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Image</label>
                        <input class="form-control"  name="image" />
                    </div>
                    <div class="col mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Genre</label>
                        <input class="form-control"  name="genre" />
                    </div>
                        </div>
                    <div class="row align-items-start">
                    <div class="col mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Auteur</label>
                        <select class="form-control" placeholder="Type to search..." name="auteur">
                            <option selected disabled>Choisir un auteur</option>
                            <?php
                            $auteurs = $auth->searchAuteur("");
                            foreach ($auteurs as $auteur) {
                                echo "<option value='".$auteur->getId()."'>".$auteur->getNom()." ".$auteur->getPrenom()."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Artiste</label>
                        <select class="form-control" placeholder="Type to search..." name="artiste">
                            <option selected disabled>Choisir un artiste</option>
                            <?php
                            $artistes = $auth->searchArtiste("");
                            foreach ($artistes as $artiste) {
                                echo "<option value='".$artiste->getId()."'>".$artiste->getNom()." ".$artiste->getPrenom()."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Ajouter Manga</button>
                    </div>
                </form>
        </div>
    </div>

</div>
<script src="/public/js/Alert.js"></script>
<?php
if(isset($_POST["form_name"])){
    if($auth->getError() !== null){
    ?>
    <script> createAlert('Oups!','Quelque chose c\'est mal passé :( ',`<?= $auth->getError();?>`,'danger',false,true,'pageMessages') </script>
    <?php
}else{
    ?>
    <script> createAlert('Succés !','Donnée ajouté !',`<?= $auth->getSuccess();?>`,'success',false,true,'pageMessages') </script>
    <?php
    }
}
?>
<script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>

<?php include './parts/footer.php'; ?>
</body>
</html>
