<?php
    include $_SERVER['DOCUMENT_ROOT'].'/src/entity/detailcommande.php';
    trait detailCommandeRepository{
        public function __construct(){
            parent::__construct();
        }
        public function insertDetailCommande(DetailCommande $detailCommande): string
        {
            parent::query('INSERT INTO detailcommande (Quantite,ID_COMMANDE,ID_MANGA) VALUES (?,?,?)', [$detailCommande->getQuantite(),$detailCommande->getCommande()->getId(),$detailCommande->getManga()->getId()]);
            return $this->getDb()->lastInsertId();
        }

         public function findDetailCommande(DetailCommande $detailCommande): ?DetailCommande
         {
            $detailCommande = parent::find("detailcommande", $detailCommande->getId());
            if($detailCommande){
                return new DetailCommande($detailCommande[0]["ID_DETAILCOMMANDE"], $detailCommande[0]["Quantite"], $this->select(new Manga($detailCommande[0]["ID_MANGA"])), $this->select(new Commande($detailCommande[0]["ID_COMMANDE"])));
            }else{
                return null;
            }
         }

         public function deleteDetailCommande(DetailCommande $detailCommande): ?int
         {
            $query = parent::query("DELETE FROM detailcommande WHERE ID_DETAILCOMMANDE = ?", [$detailCommande->getId()]);
            if($query){
                return $query->rowCount();
            }else{
                return null;
            }
        }

         public function updateDetailCommande(DetailCommande $detailCommande): ?int
         {
            $query = parent::query("UPDATE detailcommande SET Quantite = ?, ID_COMMANDE = ?, ID_MANGA = ? WHERE ID_DETAILCOMMANDE = ?", [$detailCommande->getQuantite(),$detailCommande->getCommande()->getId(),$detailCommande->getManga()->getId(),$detailCommande->getId()]);
            if($query){
                return $query->rowCount();
            }else{
                return null;
            }
        }
    }