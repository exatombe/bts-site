<?php
    include './src/entity/manga.php';
    trait mangaRepository{
        public function __construct(){
            parent::__construct();
        }
        public function insertManga(Manga $manga){
            $this->db->query('INSERT INTO commande (Titre, Prix, Editeur, Genre, Synopsis, Format, ISBN, Image, ID_AUTEUR, ID_ARTISTE) VALUES (?,?,?,?,?,?,?,?,?,?)', [$manga->getTitre(), $manga->getPrix(), $manga->getEditeur(), $manga->getGenre(), $manga->getSynopsis(), $manga->getFormat(), $manga->getIsbn(), $manga->getImage(), $manga->getArtiste()->getid(), $manga->getAuteur()->getId()]);
        }
 
        public function updateManga(Manga $manga){
            $this->db->query("UPDATE commande SET Titre = ?, Prix = ?, Editeur = ?, Genre = ?, Synopsis = ?, Format = ?, ISBN = ?, Image = ?, ID_AUTEUR = ?, ID_ARTISTE = ? WHERE ID_MANGA = ?", [$manga->getTitre(),$manga->getPrix(),$manga->getEditeur(),$manga->getGenre(),$manga->getSynopsis(),$manga->getFormat(),$manga->getIsbn(),$manga->getImage(),$manga->getArtiste()->getid(),$manga->getAuteur()->getId(),$manga->getId()]);
        }

        public function deleteManga(Manga $manga){
            $this->db->query("DELETE FROM commande WHERE ID_MANGA = ?", [$manga->getId()]);
        }

        public function findManga(Manga $manga){
            $manga = $this->db->find("commande", $manga->getId());
            return new Manga($manga[0]["ID_MANGA"], $manga[0]["Titre"], $manga[0]["Prix"], $manga[0]["Editeur"], $manga[0]["Genre"], $manga[0]["Synopsis"], $manga[0]["Format"], $manga[0]["ISBN"], $manga[0]["Image"], $manga[0]["ID_AUTEUR"], $manga[0]["ID_ARTISTE"]);
        }
    }