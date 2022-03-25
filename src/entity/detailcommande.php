<?php
include './src/entity/manga.php';
include './src/entity/commande.php';

/**
 * Classe detail commande, (correspond à un article au sein d'une commande)
 */

class DetailCommande
{
    /** @param id */
    private $id;
    /** @param quantite*/
    private $quantite;
    /** @param commande reference Commande */
    private $commande;
    /** @param manga reference Manga */
    private $manga;

    public function __construct(?int $id = null, ?int $quantite= null, ?Manga $manga = null, ?Commande $commande = null)
    {
        
            $this->id = $id;
            $this->quantite = $quantite;
            $this->manga = $manga;
            $this->commande = $commande;
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
     * Get the value of quantite
     */
    public function getQuantite():?int
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */
    public function setQuantite(int $quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get the value of commande
     */
    public function getCommande():?Commande
    {
        return $this->commande;
    }

    /**
     * Set the value of commande
     *
     * @return  self
     */
    public function setCommande(Commande $commande)
    {
        $this->commande = $commande;

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
}
