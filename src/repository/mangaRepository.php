<?php
    include $_SERVER['DOCUMENT_ROOT'].'/src/entity/Manga.php';
    trait mangaRepository{
        public function __construct(){
            parent::__construct();
        }
        public function insertManga(Manga $manga): string
        {
            parent::query('INSERT INTO manga (Titre, Prix, Editeur, Genre, Synopsis, Format, ISBN, Image, ID_AUTEUR, ID_ARTISTE) VALUES (?,?,?,?,?,?,?,?,?,?)', [$manga->getTitre(), $manga->getPrix(), $manga->getEditeur(), $manga->getGenre(), $manga->getSynopsis(), $manga->getFormat(), $manga->getIsbn(), $manga->getImage(), $manga->getArtiste()->getid(), $manga->getAuteur()->getId()]);
            return $this->getDb()->lastInsertId();
        }

        public function updateManga(Manga $manga): bool
        {
            $query = parent::query("UPDATE manga SET Titre = ?, Prix = ?, Editeur = ?, Genre = ?, Synopsis = ?, Format = ?, ISBN = ?, Image = ?, ID_AUTEUR = ?, ID_ARTISTE = ? WHERE ID_MANGA = ?", [$manga->getTitre(),$manga->getPrix(),$manga->getEditeur(),$manga->getGenre(),$manga->getSynopsis(),$manga->getFormat(),$manga->getIsbn(),$manga->getImage(),$manga->getArtiste()->getid(),$manga->getAuteur()->getId(),$manga->getId()]);
            if($query){
                return $query->rowCount();
            }else{
                return false;
            }
        }

        public function deleteManga(Manga $manga): bool
        {
            $query = parent::query("DELETE FROM manga WHERE ID_MANGA = ?", [$manga->getId()]);
            if($query){
                return $query->rowCount();
            }else{
                return false;
            }
        }

        public function findManga(Manga $manga): ?Manga
        {
            $manga = parent::find('manga', $manga->getId());
            if($manga) {
                return new Manga($manga[0]["ID_MANGA"], $manga[0]["Titre"], $manga[0]["Prix"], $manga[0]["Editeur"], $manga[0]["Genre"], $manga[0]["Synopsis"], $manga[0]["Format"], $manga[0]["ISBN"], $manga[0]["Image"], $this->select(new Auteur($manga[0]["ID_AUTEUR"])), $this->select(new Artiste($manga[0]["ID_ARTISTE"])));
            }else {
                return null;
            }
            }
    }