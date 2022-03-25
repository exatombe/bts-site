<?php
    include './src/entity/commande.php';
    trait CommandeRepository{
        public function __construct(){
            parent::__construct();
        }
        public function insertCommande(Commande $commande){
           $this->db->query('INSERT INTO commande (Panier,ID_USER) VALUES (?,?)', [$commande->getPanier(),$commande->getUser()->getId()]);
        }

        public function findCommande(Commande $commande){
            $commande = $this->db->find("commande", $commande->getId());
            return new Commande($commande[0]["ID_COMMANDE"], $commande[0]["Panier"], $commande[0]["User"]);
        }
        
        public function deleteCommande(Commande $commande){
            $this->db->query("DELETE FROM commande WHERE ID_COMMANDE = ?", [$commande->getId()]);
        }

        public function updateCommande(Commande $commande){
            $this->db->query("UPDATE commande SET Panier = ?, User = ? WHERE ID_COMMANDE = ?", [$commande->getPanier(),$commande->getUser()->getId(),$commande->getId()]);
        }
    }