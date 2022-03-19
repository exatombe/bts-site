<?php
include "./class/database.php";
include "./class/manga.php";
include "./class/commande.php";
/**
 * Classe detail commande, (correspond à un article au sein d'une commande)
 */

class DetailCommande extends Database
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
            $detailcommande = parent::query('INSERT INTO detailcommande (Quantite,ID_MANGA, ID_COMMANDE) VALUES (?,?,?)', [$quantite, $manga->getid(), $commande->getId()]);
            $this->id = $id;
            $this->quantite = $quantite;
            $this->manga = $manga;
            $this->commande = $commande;
        } else {
            $detailcommande = parent::find("detailcommande", strval($id));

            $this->id = $id;
            $this->quantite = count($detailcommande) == 1 ? $detailcommande[0]["Quantite"] : null;
            $this->manga = count($detailcommande) == 1 ? new Manga(intval($detailcommande[0]["ID_MANGA"])) : null;
            $this->commande = count($detailcommande) == 1 ? new Commande(intval($detailcommande[0]["ID_COMMANDE"])) : null;
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

    public function update(): bool
    {
        if (isset($this->quantite) && isset($this->manga) && isset($this->commande)) {
            $query = Database::query("UPDATE detailcommande SET Quantite='?', ID_MANGA='?', ID_COMMANDE='?'", [$this->quantite, $this->manga->getId(), $this->commande->getId()]);
            if ($query) {
                return true;
            } else return false;
        } else return false;
    }

    public function delete(): bool
    {
        $query = Database::query("DELETE FROM detailcommande WHERE ID_DETAILCOMMANDE='?'", [$this->id]);
        return $query ? true : false;
    }
}
