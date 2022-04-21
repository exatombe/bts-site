<?php
    include $_SERVER['DOCUMENT_ROOT'].'/src/entity/artiste.php';
    trait artisteRepository{
        public function __construct(){
            parent::__construct();
        }
    
        public function insertArtiste(Artiste $artiste): string{
           parent::query('INSERT INTO artiste (Nom,Prenom,Genre,Nationalite) VALUES (?,?,?,?)', [$artiste->getNom(), $artiste->getPrenom(), $artiste->getGenre(), $artiste->getNationalite()]);
           return $this->getDb()->lastInsertId();
        }

        public function findArtiste(Artiste $artiste): ?Artiste
        {
            $artiste = parent::find("artiste", $artiste->getId());
            if($artiste){
                return new Artiste($artiste[0]["ID_ARTISTE"], $artiste[0]["Nom"], $artiste[0]["Prenom"], $artiste[0]["Genre"], $artiste[0]["Nationalite"]);
            }else{
                return null;
            }
        }
        
        public function deleteArtiste(Artiste $artiste): ?int
        {
            $query = parent::query("DELETE FROM artiste WHERE ID_ARTISTE = ?", [$artiste->getId()]);
            if($query){
                return $query->rowCount();
            }else{
                return null;
            }
        }

        public function updateArtiste(Artiste $artiste): ?int
        {
            $query = parent::query("UPDATE artiste SET Nom = ?, Prenom = ?, Genre = ?, Nationalite = ? WHERE ID_ARTISTE = ?", [$artiste->getNom(), $artiste->getPrenom(), $artiste->getGenre(), $artiste->getNationalite(), $artiste->getId()]);
            if($query){
                return $query->rowCount();
            }else{
                return null;
            }
        }
    }