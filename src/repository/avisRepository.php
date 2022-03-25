<?php
    // include avis class
    include './src/entity/avis.php';
    trait avisRepository{
        public function __construct(){
            parent::__construct();
        }
        public function insertAvis(Avis $avis){
            $this->db->query('INSERT INTO avis (Note,Commentaire,Date,ID_Manga,ID_USER) VALUES (?,?,?)', [$avis->getNote(), $avis->getCommentaire(), $avis->getDate()->format("YYYY-MM-DD hh:mm:ss"), $avis->getManga()->getid(), $avis->getUser()->getid()]);
         }
 
         public function updateAvis(Avis $avis){
             $this->db->query("UPDATE avis SET Note = ?, Commentaire = ?, Date = ?, ID_Manga = ?, ID_USER = ? WHERE ID_AVIS = ?", [$avis->getNote(),$avis->getCommentaire(),$avis->getDate()->format("YYYY-MM-DD hh:mm:ss"),$avis->getManga()->getid(),$avis->getUser()->getid(),$avis->getId()]);
         }

         public function deleteAvis(Avis $avis){
             $this->db->query("DELETE FROM avis WHERE ID_AVIS = ?", [$avis->getId()]);
         }

         public function findAvis(Avis $avis){
             $avis = $this->db->find("avis", $avis->getId());
             return new Avis($avis[0]["ID_AVIS"], $avis[0]["Note"], $avis[0]["Commentaire"], $avis[0]["Date"], $avis[0]["ID_Manga"], $avis[0]["ID_USER"]);
         }
    }
?>