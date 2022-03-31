<?php

/**
 * Classe Artiste (Info essentiel sur un artiste)
 */
class Artiste
{
    /** @var int|null  */
    private $id;
    /** @var string|null  */
    private $nom;
    /** @var string|null  */
    private $prenom;
    /** @var string|null  */
    private $genre;
    /** @var string|null  */
    private $nationalite;
    public function __construct(?int $id = null, ?string $nom = null, ?string $prenom = null, ?string $genre = null, ?string $nationalite = null)
    {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->genre = $genre;
            $this->nationalite = $nationalite;
    }

    /**
     * Get the value of id
     */
    public function getId():?int
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
     * Get the value of nom
     */
    public function getNom():?string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNom(string $nom):self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom():?string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */
    public function setPrenom(string $prenom):self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of genre
     */
    public function getGenre():?string
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
     * Get the value of nationalite
     */
    public function getNationalite():?string
    {
        return $this->nationalite;
    }

    /**
     * Set the value of nationalite
     *
     * @return  self
     */
    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }
   
}
