<?php
    include './src/entity/detailcommande.php';
    trait detailCommandeRepository{
        public function __construct(){
            parent::__construct();
        }
        public function insertDetailCommande(DetailCommande $detailCommande){
            $this->db->query('INSERT INTO detailcommande (Quantite,ID_COMMANDE,ID_MANGA) VALUES (?,?,?,?)', [$detailCommande->getQuantite(),$detailCommande->getCommande()->getId(),$detailCommande->getManga()->getId()]);
         }

         public function findDetailCommande(DetailCommande $detailCommande){
            $detailCommande = $this->db->find("detailcommande", $detailCommande->getId());
            return new DetailCommande($detailCommande[0]["ID_DETAILCOMMANDE"], $detailCommande[0]["Quantite"], $detailCommande[0]["Commande"], $detailCommande[0]["Manga"]);
         }

         public function deleteDetailCommande(DetailCommande $detailCommande){
            $this->db->query("DELETE FROM detailcommande WHERE ID_DETAILCOMMANDE = ?", [$detailCommande->getId()]);
         }

         public function updateDetailCommande(DetailCommande $detailCommande){
            $this->db->query("UPDATE detailcommande SET Quantite = ?, Commande = ?, Manga = ? WHERE ID_DETAILCOMMANDE = ?", [$detailCommande->getQuantite(),$detailCommande->getCommande()->getId(),$detailCommande->getManga()->getId(),$detailCommande->getId()]);
         }
    }