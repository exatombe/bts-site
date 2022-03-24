<?php
include './src/repository/database.php';
include './src/entity/artiste.php';
include './src/entity/auteur.php';

/**
 * Classe manga, contient toutes les informations essentiels sur un manga !
 */

class Manga extends Database
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

    public function __construct(int $id = 0, ?string $titre = null, ?int $prix = null, ?string $editeur = null, ?string $genre = null, ?string $synopsis = null, ?string $format = null, ?string $isbn = null, ?string $image = null, ?Auteur $auteur = null, ?Artiste $artiste = null)
    {
        parent::__construct();
        if ($id === 0) {
            $manga = parent::query('INSERT INTO commande (Quantite,ID_MANGA, ID_COMMANDE) VALUES (?,?,?,?,?,?,?,?,?,?)', [$titre, $prix, $editeur, $genre, $synopsis, $format, $isbn, $image, $artiste->getid(), $auteur->getId()]);
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
            $this->artiste = count($manga) == 1 ? new Artiste(intval($manga[0]["ID_ARTISTE"])) : null;
            $this->auteur = count($manga) == 1 ? new Auteur(intval($manga[0]["ID_AUTEUR"])) : null;
        }
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Get the value of titre
     */
    public function getTitre(): ?string
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */
    public function setTitre(string $titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of prix
     */
    public function getPrix(): ?int
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */
    public function setPrix(int $prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of editeur
     */
    public function getEditeur(): ?string
    {
        return $this->editeur;
    }

    /**
     * Set the value of editeur
     *
     * @return  self
     */
    public function setEditeur(string $editeur)
    {
        $this->editeur = $editeur;

        return $this;
    }

    /**
     * Get the value of genre
     */
    public function getGenre(): ?string
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */
    public function setGenre(string $genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get the value of synopsis
     */
    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    /**
     * Set the value of synopsis
     *
     * @return  self
     */
    public function setSynopsis(string $synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get the value of format
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * Set the value of format
     *
     * @return  self
     */
    public function setFormat(string $format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get the value of isbn
     */
    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    /**
     * Set the value of isbn
     *
     * @return  self
     */
    public function setIsbn(string $isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage(string $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of auteur
     */
    public function getAuteur(): ?Auteur
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     *
     * @return  Auteur
     */
    public function setAuteur(Auteur $auteur)
    {
        $this->auteur = $auteur;

        return $this->auteur = $auteur;
    }

    /**
     * Get the value of artiste
     */
    public function getArtiste(): ?Artiste
    {
        return $this->artiste;
    }

    /**
     * Set the value of artiste
     *
     * @return  Artiste
     */
    public function setArtiste(Artiste $artiste)
    {
        $this->artiste = $artiste;

        return $this;
    }
}
