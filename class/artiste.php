<?php
/**
 * Créer la classe Artiste
 */
class Artiste extends Database {
    /** @param id reference ID_ */
    private $id;
    /** @param nom reference Nom */
    private $nom;
    /** @param prenom reference Prenom */
    private $prenom;
    /** @param genre reference Genre */
    private $genre;
    /** @param nationalite reference Nationalite */
    private $nationalite;

    public function __construct(int $id = 0,string $username="",string $email="",string $password="")
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }


}