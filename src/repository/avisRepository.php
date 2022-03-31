<?php
    include $_SERVER['DOCUMENT_ROOT'].'/src/entity/avis.php';
    trait avisRepository{
        public function __construct(){
            parent::__construct();
        }
        public function insertAvis(Avis $avis): string
        {
            parent::query('INSERT INTO avis (Note,Commentaire,Date,ID_Manga,ID_USER) VALUES (?,?,?,?,?)', [$avis->getNote(), $avis->getCommentaire(), $avis->getDate()->format("YYYY-MM-DD hh:mm:ss"), $avis->getManga()->getid(), $avis->getUser()->getid()]);
            return $this->getDb()->lastInsertId();
        }
 
         public function updateAvis(Avis $avis): ?int
         {
             $query = parent::query("UPDATE avis SET Note = ?, Commentaire = ?, Date = ?, ID_Manga = ?, ID_USER = ? WHERE ID_AVIS = ?", [$avis->getNote(),$avis->getCommentaire(),$avis->getDate()->format("YYYY-MM-DD hh:mm:ss"),$avis->getManga()->getid(),$avis->getUser()->getid(),$avis->getId()]);
             if($query){
                 return $query->rowCount();
             }else{
                 return null;
             }
        }

         public function deleteAvis(Avis $avis): ?int
         {
            $query = parent::query("DELETE FROM avis WHERE ID_AVIS = ?", [$avis->getId()]);
             if($query){
                 return $query->rowCount();
             }else{
                 return null;
             }
         }


        public function findAvis(Avis $avis): ?Avis
         {
             $avis = parent::find("avis", $avis->getId());
             if($avis){
                 return new Avis($avis[0]["ID_AVIS"], $avis[0]["Note"], $avis[0]["Commentaire"], new \DateTime([0]["Date"]), $this->select(new Manga($avis[0]["ID_Manga"])), $this->select(new User($avis[0]["ID_USER"])));
             }else{
                 return null;
             }
         }
    }
?>