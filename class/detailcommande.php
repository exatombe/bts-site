<?php
include "./class/database.php";
include "./class/manga.php";
include "./class/commande.php";
/**
ID_DETAILCOMMANDE	Quantite	ID_COMMANDE	ID_MANGA */

class Commande extends Database
{
    /** @param id */
    private $id;
    /** @param quantite*/
    private $quantite;
    /** @param commande reference Commande */
    private $commande;
    /** @param manga reference Manga */
    private $manga;

    public function __construct(int $id = 0, int $quantite, Manga $manga, Commande $commande)
    {
        parent::__construct();
        if ($id === 0) {
            $detailcommande = parent::query('INSERT INTO commande (Quantite,ID_MANGA, ID_COMMANDE) VALUES (?,?,?)', [$quantite,$manga->getid(),$commande->getId()]);
            $this->id = $id;
            $this->quantite = $quantite;
            $this->manga = $manga;
            $this->commande = $commande;
        } else {
            $detailcommande = parent::find("detailcommande", strval($id));

            $this->id = $id;
            $this->quantite = count($detailcommande) == 1 ? $detailcommande[0]["quantite"] : null;
            $this->manga = count($detailcommande) == 1 ? new Manga(int($detailcommande[0]["ID_MANGA"])) : null;
            $this->commande = count($detailcommande) == 1 ? new Commande(int($detailcommande[0]["ID_COMMANDE"])) : null;
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

    public function setQuantite(int $quantite)
    {
        return $this->quantite = $quantite;
    }

    public function getQuantie(): ?int
    {
        return $this->quantite;
    }

    public function setManga(Manga $manga)
    {
        return $this->manga = $manga;
    }

    public function getManga(): ?Manga
    {
        return $this->manga;
    }

    public function setCommande(Commande $commande)
    {
        return $this->commande = $commande;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

}
