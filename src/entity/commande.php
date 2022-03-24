<?php

include './src/repository/database.php';
include './src/entity/user.php';
/**
 * Classe commande (Sert à spécifier si la commande est un panier ou  une commande)
 */

class Commande extends Database
{
    /** @param id */
    private $id;
    /** @param panier */
    private $panier;
    /** @param user reference User */
    private $user;

    public function __construct(int $id = 0, bool $panier = true, User $user = new User(0))
    {
        parent::__construct();
        if ($id === 0) {
            $commande = parent::query('INSERT INTO commande (Panier,ID_USER) VALUES (?,?)', [$panier, $user->getid()]);
            $this->id = $id;
            $this->panier = $panier;
            $this->user = $user;
        } else {
            $commande = parent::find("commande", strval($id));

            $this->id = $id;
            $this->panier = count($commande) == 1 ? $commande[0]["Panier"] : null;
            $this->user = count($commande) == 1 ? new User(intval($commande[0]["ID_USER"])) : null;
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
