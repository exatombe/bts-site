<?php

/**
 * Classe avis, correspond à un avis (lié à un manga, et à un user)
 */
class Avis 
{
    /** @var int|null  */
    private $id;
    /** @var string|null  */
    private $note;
    /** @var string|null  */
    private $commentaire;
    /** @var DateTime|null */
    private $date;
    /** @var Manga|null */
    private $manga;
    /** @var User|null */
    private $user;

    public function __construct(?int $id = null, ?string $note = null, ?string $commentaire = null, ?DateTime $date = null, ?Manga $manga = null, ?User $user = null)
    {
            $this->id = $id;
            $this->note = $note;
            $this->commentaire = $commentaire;
            $this->date = $date ?: new DateTime("now");
            $this->manga = $manga;
            $this->user = $user;
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
    public function setId(int $id) :self
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
    public function setNote(int $note): self
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
    public function setCommentaire(string $commentaire): self
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
    public function setDate(DateTime $date):self
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
    public function setManga(Manga $manga):self
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
    public function setUser(User $user):self
    {
        $this->user = $user;

        return $this;
    }
}
