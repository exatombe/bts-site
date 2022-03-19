<?php
include "./class/database.php";
include "./class/user.php";
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

    public function setId(int $id)
    {
        return $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setPanier(bool $panier)
    {
        return $this->panier = $panier;
    }

    public function getPanier(): ?bool
    {
        return $this->panier;
    }

    public function setUser(User $user)
    {
        return $this->user = $user;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }
}
