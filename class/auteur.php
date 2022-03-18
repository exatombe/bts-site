<?php
/**
 * Créer la classe Auteur
 */
class Auteur extends Database {
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

    public function __construct(int $id=0,string $nom ="",string $prenom="",string $genre="", string $nationalite="")
    {
        Database::query("");
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->genre = $genre;
        $this->nationalite = $nationalite;
    }
}