<?php
include "./class/database.php";
include "./class/auteur.php";
include "./class/artiste.php";
/**
ID_MANGA	Titre	Prix	Editeur	Genre	Synopsis	Format	ISBN	Image	ID_AUTEUR	ID_ARTISTE */

class Commande extends Database
{
    /** @param id */
    private $id;
    /** @param titre*/
    private $titre;
    /** @param Prix */
    private $prix;
    /** @param Editeur */
    private $editeur;
    /** @param Genre */
    private $genre;
    /** @param Synopsis */
    private $synopsis;
    /** @param Format */
    private $format;
    /** @param ISBN */
    private $isbn;
    /** @param Image */
    private $image;
    /** @param auteur reference Auteur */
    private $auteur;
    /** @param artiste reference Artiste */
    private $artiste;

    public function __construct(int $id = 0, string $titre, double $prix, string $editeur, string $genre, string $synopsis, string $format, string $isbn, string $image,Auteur $auteur, Artiste $artiste)
    {
        parent::__construct();
        if ($id === 0) {
            $manga = parent::query('INSERT INTO commande (Quantite,ID_MANGA, ID_COMMANDE) VALUES (?,?,?,?,?,?,?,?,?,?)', [$titre,$prix,$editeur,$genre,$synopsis,$format,$isbn,$image,$artiste->getid(),$auteur->getId()]);
            $this->id = $id;
            $this->titre = $titre;
            $this->prix = $prix;
            $this->editeur = $editeur;
            $this->genre = $genre;
            $this->synopsis = $synopsis;
            $this->format = $format;
            $this->isbn = $isbn;
            $this->image = $image;
            $this->artiste = $artiste;
            $this->auteur = $auteur;
        } else {
            $manga = parent::find("manga", strval($id));

            $this->id = $id;
            $this->titre = count($manga) == 1 ? $manga[0]["Titre"] : null;
            $this->prix = count($manga) == 1 ? $manga[0]["Prix"] : null;
            $this->editeur = count($manga) == 1 ? $manga[0]["Editeur"] : null;
            $this->genre = count($manga) == 1 ? $manga[0]["Genre"] : null;
            $this->synopsis = count($manga) == 1 ? $manga[0]["Synopsis"] : null;
            $this->format = count($manga) == 1 ? $manga[0]["Format"] : null;
            $this->isbn = count($manga) == 1 ? $manga[0]["ISBN"] : null;
            $this->image = count($manga) == 1 ? $manga[0]["Image"] : null;
            $this->artiste = count($manga) == 1 ? new Artiste(int($manga[0]["ID_ARTISTE"])) : null;
            $this->auteur = count($manga) == 1 ? new Auteur(int($manga[0]["ID_AUTEUR"])) : null;
        }
    }

    public function setId(int $id)
    {
        return $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setTitre(string $titre)
    {
        return $this->titre = $titre;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setPrix(int $prix)
    {
        return $this->prix = prix;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setCommande(Commande $commande)
    {
        return $this->commande = $commande;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

}
