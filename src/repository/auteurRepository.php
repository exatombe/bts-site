<?php 
    include './src/entity/auteur.php';
    trait AuteurRepository{
        public function __construct(){
            parent::__construct();
        }
        public function insertAuteur(Auteur $auteur){
           $this->db->query('INSERT INTO auteur (Nom,Prenom,Genre,Nationalite) VALUES (?,?,?,?)', [$auteur->getNom(), $auteur->getPrenom(), $auteur->getGenre(), $auteur->getNationalite()]);
        }

        public function findAuteur(Auteur $auteur){
            $auteur = $this->db->find("auteur", $auteur->getId());
            return new Auteur($auteur[0]["ID_AUTEUR"], $auteur[0]["Nom"], $auteur[0]["Prenom"], $auteur[0]["Genre"], $auteur[0]["Nationalite"]);
        }
        
        public function deleteAuteur(Auteur $auteur){
            $this->db->query("DELETE FROM auteur WHERE ID_AUTEUR = ?", [$auteur->getId()]);
        }

        public function updateAuteur(Auteur $auteur){
            $this->db->query("UPDATE auteur SET Nom = ?, Prenom = ?, Genre = ?, Nationalite = ? WHERE ID_AUTEUR = ?", [$auteur->getNom(), $auteur->getPrenom(), $auteur->getGenre(), $auteur->getNationalite(), $auteur->getId()]);
        }
    }