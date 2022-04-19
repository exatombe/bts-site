<?php
/**
 * Classe manga, contient toutes les informations essentiels sur un manga !
 */

class Manga
{
    /** @var int|null  */
    private $id;
    /** @var string|null  */
    private $titre;
    /** @var int|null  */
    private $prix;
    /** @var string|null  */
    private $editeur;
    /** @var string|null  */
    private $genre;
    /** @var string|null  */
    private $synopsis;
    /** @var string|null  */
    private $format;
    /** @var string|null  */
    private $isbn;
    /** @var string|null  */
    private $image;
    /** @var Auteur|null  */
    private $auteur;
    /** @var Artiste|null  */
    private $artiste;


    public function __construct(?int $id = null, ?string $titre = null, ?float $prix = null, ?string $editeur = null, ?string $genre = null, ?string $synopsis = null, ?string $format = null, ?string $isbn = null, ?string $image = null, ?Auteur $auteur = null, ?Artiste $artiste = null)
    {
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
    public function setId(int $id): self
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
    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of prix
     */
    public function getPrix(): ?float
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */
    public function setPrix(float $prix): self
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
    public function setEditeur(string $editeur): self
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
    public function setGenre(string $genre): self
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
    public function setSynopsis(string $synopsis): self
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
    public function setFormat(string $format): self
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
    public function setIsbn(string $isbn): self
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
    public function setImage(string $image): self
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
     * @return  self
     */
    public function setAuteur(Auteur $auteur): self
    {
        $this->auteur = $auteur;
        return $this;
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
     * @return  self
     */
    public function setArtiste(Artiste $artiste): self
    {
        $this->artiste = $artiste;
        return $this;
    }
}
