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
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body style="background-color: lightgray;">
<?php include "./parts/header.php"; ?>
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
                    <button type="submit" class="btn btn-primary mb-3">Ajouté Auteur</button>
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
                    <button type="submit" class="btn btn-primary mb-3">Ajouté artiste</button>
                </div>
                </form>
            </div>
        </div>
        </div>
    <div class="row align-items-start">
        <div class="col mb-3">
            <div class="col mb-3">
                <h3>Manga</h3>
                <form method="post">
                    <input type="hidden" name="form_name" value="manga" />
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Titre</label>
                        <input class="form-control" name="titre"  />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Prix</label>
                        <input class="form-control"  type="number" name="prix"  />
                    </div>
                    <div class="mb-6">
                        <label for="exampleFormControlTextarea1" class="form-label">Editeur</label>
                        <input class="form-control" name="editeur"  />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Synopsis</label>
                        <textarea class="form-control" name="synopsis" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Format</label>
                        <input class="form-control"  name="format" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">ISBN</label>
                        <input class="form-control"  name="format" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Image</label>
                        <input class="form-control"  name="image" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Genre</label>
                        <input class="form-control"  name="genre" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Auteur</label>
                        <select class="form-control" placeholder="Type to search..." name="auteur">
                            <?php
                            $auteurs = $auth->searchAuteur("");
                            foreach ($auteurs as $auteur) {
                                echo "<option value='".$auteur->getId()."'>".$auteur->getNom()." ".$auteur->getPrenom()."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Artiste</label>
                        <select class="form-control" placeholder="Type to search..." name="artiste">
                            <?php
                            $artistes = $auth->searchArtiste("");
                            foreach ($artistes as $artiste) {
                                echo "<option value='".$artiste->getId()."'>".$artiste->getNom()." ".$artiste->getPrenom()."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Ajouté Manga</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
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
