<?php
include './src/entity/user.php';
/**
 * Classe commande (Sert à spécifier si la commande est un panier ou  une commande)
 */

class Commande 
{
    /** @param id */
    private $id;
    /** @param panier */
    private $panier;
    /** @param user reference User */
    private $user;

    public function __construct(?int $id = null, bool $panier = true, ?User $user = null)
    {
            $this->id = $id;
            $this->panier = $panier;
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
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of panier
     */ 
    public function getPanier():?bool
    {
        return $this->panier;
    }

    /**
     * Set the value of panier
     *
     * @return  self
     */ 
    public function setPanier(bool $panier)
    {
        $this->panier = $panier;

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
