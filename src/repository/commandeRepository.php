<?php
    include $_SERVER['DOCUMENT_ROOT'].'/src/entity/commande.php';
    trait commandeRepository{
        public function __construct(){
            parent::__construct();
        }
        public function insertCommande(Commande $commande): string
        {
          parent::query('INSERT INTO commande (Panier,ID_USER) VALUES (?,?)', [$commande->getPanier(),$commande->getUser()->getId()]);
          return $this->getDb()->lastInsertId();
        }

        public function findCommande(Commande $commande): ?Commande
        {
            $commande = parent::find("commande", $commande->getId());
            if($commande){
                return new Commande($commande[0]["ID_COMMANDE"], $commande[0]["Panier"], $this->select(new User($commande[0]["ID_USER"])));
            }else{
                return null;
            }
        }
        
        public function deleteCommande(Commande $commande): ?int
        {
            $query = parent::query("DELETE FROM commande WHERE ID_COMMANDE = ?", [$commande->getId()]);
            if($query){
                return $query->rowCount();
            }else{
                return null;
            }
        }

        public function updateCommande(Commande $commande): ?int
        {
           $query = parent::query("UPDATE commande SET Panier = ?, ID_USER = ? WHERE ID_COMMANDE = ?", [$commande->getPanier(),$commande->getUser()->getId(),$commande->getId()]);
           if($query){
               return $query->rowCount();
           }else{
               return null;
           }
        }
    }