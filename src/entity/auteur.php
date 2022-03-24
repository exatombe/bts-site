<?php
include './src/repository/database.php';

/**
 * Classe Auteur (info essentiel sur un Auteur)
 */
class Auteur extends Database
{
    /** @param id  */
    private $id;
    /** @param nom  */
    private $nom;
    /** @param prenom  */
    private $prenom;
    /** @param genre  */
    private $genre;
    /** @param nationalite  */
    private $nationalite;
    public function __construct(int $id = 0, string $nom = "", string $prenom = "", string $genre = "", string $nationalite = "")
    {
        parent::__construct();
        if ($id === 0) {
            $auteur = parent::query('INSERT INTO auteur (Nom,Prenom,Genre,Nationalite) VALUES (?,?,?,?)', [$nom, $prenom, $genre, $nationalite]);
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->genre = $genre;
            $this->nationalite = $nationalite;
        } else {
            $auteur = parent::find("auteur", strval($id));

            $this->id = $id;
            $this->nom = count($auteur) == 1 ? $auteur[0]["Nom"] : null;
            $this->prenom = count($auteur) == 1 ? $auteur[0]["Prenom"] : null;
            $this->genre = count($auteur) == 1 ? $auteur[0]["Genre"] : null;
            $this->nationalite = count($auteur) == 1 ? $auteur[0]["Nationalite"] : null;
        }
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
    public function setId(int $id)
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
    public function setNom(string $nom)
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
    public function setPrenom(string $prenom)
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
    public function setGenre(string $genre)
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
    public function setNationalite(string $nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }
}
