<?php
include './src/repository/database.php';
include './src/entity/manga.php';
include './src/entity/user.php';

/**
 * Classe avis, correspond à un avis (lié à un manga, et à un user)
 */
class Avis extends Database
{
    /** @param id */
    private $id;
    /** @param note  */
    private $note;
    /** @param commentaire */
    private $commentaire;
    /** @param date  */
    private $date;
    /** @param manga reference Manga */
    private $manga;
    /** @param user reference User */
    private $user;

    public function __construct(int $id = 0, string $note = "", string $commentaire = "", DateTime $date = new \DateTime('now'), Manga $manga = new Manga(0), User $user = new User(0))
    {
        parent::__construct();
        if ($id === 0) {
            $avis = parent::query('INSERT INTO avis (Note,Commentaire,Date,ID_Manga,ID_USER) VALUES (?,?,?,?,?)', [$note, $commentaire, $date->format("YYYY-MM-DD hh:mm:ss"), $manga->getid(), $user->getid()]);
            $this->id = $id;
            $this->note = $note;
            $this->commentaire = $commentaire;
            $this->date = $date;
            $this->manga = $manga;
            $this->user = $user;
        } else {
            $avis = parent::find("avis", strval($id));

            $this->id = $id;
            $this->note = count($avis) == 1 ? $avis[0]["Note"] : null;
            $this->commentaire = count($avis) == 1 ? $avis[0]["Commentaire"] : null;
            $this->date = count($avis) == 1 ? new \DateTime($avis[0]["Date"]) : null;
            $this->id_manga = count($avis) == 1 ? new Manga(intval($avis[0]["ID_MANGA"])) : null;
            $this->id_user = count($avis) == 1 ? new User(intval($avis[0]["ID_USER"])) : null;
        }
    }



    /**
     * Get the value of id
     */ 
    public function getId():?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of note
     */ 
    public function getNote():?int
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote(int $note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get the value of commentaire
     */ 
    public function getCommentaire():?string
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     *
     * @return  self
     */ 
    public function setCommentaire(string $commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate():?DateTime
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate(DateTime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of manga
     */ 
    public function getManga():?Manga
    {
        return $this->manga;
    }

    /**
     * Set the value of manga
     *
     * @return  self
     */ 
    public function setManga(Manga $manga)
    {
        $this->manga = $manga;

        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser():?User
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }
}
