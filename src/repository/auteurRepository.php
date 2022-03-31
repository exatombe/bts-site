<?php
include $_SERVER['DOCUMENT_ROOT'].'/src/entity/auteur.php';
    trait auteurRepository{
        public function __construct(){
            parent::__construct();
        }
        public function insertAuteur(Auteur $auteur): string
        {
           parent::query('INSERT INTO auteur (Nom,Prenom,Genre,Nationalite) VALUES (?,?,?,?)', [$auteur->getNom(), $auteur->getPrenom(), $auteur->getGenre(), $auteur->getNationalite()]);
           return $this->getDb()->lastInsertId();
        }

        public function findAuteur(Auteur $auteur): ?Auteur
        {
            $auteur = parent::find("auteur", $auteur->getId());
            if($auteur){
                return new Auteur($auteur[0]["ID_AUTEUR"], $auteur[0]["Nom"], $auteur[0]["Prenom"], $auteur[0]["Genre"], $auteur[0]["Nationalite"]);
            }else{
                return null;
            }
        }
        
        public function deleteAuteur(Auteur $auteur): ?int
        {
           $query = parent::query("DELETE FROM auteur WHERE ID_AUTEUR = ?", [$auteur->getId()]);
           if($query){
               return $query->rowCount();
           }else{
               return null;
           }
        }

        public function updateAuteur(Auteur $auteur): ?int
        {
            $query = parent::query("UPDATE auteur SET Nom = ?, Prenom = ?, Genre = ?, Nationalite = ? WHERE ID_AUTEUR = ?", [$auteur->getNom(), $auteur->getPrenom(), $auteur->getGenre(), $auteur->getNationalite(), $auteur->getId()]);
            if($query){
                return $query->rowCount();
            }else{
                return null;
            }
        }
    }