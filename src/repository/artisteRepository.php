<?php 
    include './src/entity/artiste.php';
    trait ArtisteRepository{
        public function __construct(){
            parent::__construct();
        }
        public function insertArtiste(Artiste $artiste){
           $this->db->query('INSERT INTO artiste (Nom,Prenom,Genre,Nationalite) VALUES (?,?,?,?)', [$artiste->getNom(), $artiste->getPrenom(), $artiste->getGenre(), $artiste->getNationalite()]);
        }

        public function findArtiste(Artiste $artiste){
            $artiste = $this->db->find("artiste", $artiste->getId());
            return new Artiste($artiste[0]["ID_ARTISTE"], $artiste[0]["Nom"], $artiste[0]["Prenom"], $artiste[0]["Genre"], $artiste[0]["Nationalite"]);
        }
        
        public function deleteArtiste(Artiste $artiste){
            $this->db->query("DELETE FROM artiste WHERE ID_ARTISTE = ?", [$artiste->getId()]);
        }

        public function updateArtiste(Artiste $artiste){
            $this->db->query("UPDATE artiste SET Nom = ?, Prenom = ?, Genre = ?, Nationalite = ? WHERE ID_ARTISTE = ?", [$artiste->getNom(), $artiste->getPrenom(), $artiste->getGenre(), $artiste->getNationalite(), $artiste->getId()]);
        }
    }