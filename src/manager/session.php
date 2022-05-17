<?php

class SessionManager
{

    public function isLogged()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    public function getUser()
    {
        return $_SESSION['user'];
    }

    public function getCommande()
    {
        return $_SESSION['commande'];
    }

    public function addArticle($article)
    {
        if (!isset($_SESSION['articles'])) {
            $_SESSION['articles'] = array($article);
        } else {
            $found = false;
            $currentSession = $_SESSION['articles'];
            foreach ($currentSession as $key => $value) {
                if ($value->getManga()->getId() == $article->getManga()->getId()) {
                    $articleCurrent = $_SESSION['articles'][$key];
                    // if the user is logged we update inside the database too
                    if ($this->isLogged()) {
                        $articleCurrent->setQuantite($value->getQuantite() + 1);
                        if($article->getId()){
                            $articleCurrent->setId($article->getId());
                        }
                        $em = new EntityRepository();
                        $em->update($articleCurrent);
                        $_SESSION['articles'][$key] =  $articleCurrent;
                    } else {
                        $_SESSION['articles'][$key] =  $articleCurrent->setQuantite($value->getQuantite() + 1);
                    }
                    $found = true;
                    // add the article to the cart
                    break;
                }
            }
            if (!$found) {
                // if the user is logged we update inside the database too
                if ($this->isLogged()) {
                    if(!$article->getId()){
                    $em = new EntityRepository();
                    $article->setCommande($_SESSION['commande']);
                    $em->insert($article); 
                }
                }
                array_push($_SESSION['articles'], $article);
            }
        }
    }

    public function getArticles()
    {
        if (isset($_SESSION['articles'])) {
            return $_SESSION['articles'];
        } else {
            return array();
        }
    }

    // remove an article from the cart
    public function removeArticle($article)
    {
        if (isset($_SESSION['articles'])) {
            $currentSession = $_SESSION['articles'];
            foreach ($currentSession as $key => $value) {
                if ($value->getManga()->getId() == $article->getManga()->getId()) {
                    // if the quantity is 1, remove the article from the cart
                    if ($value->getQuantite() == 1) {
                        unset($_SESSION['articles'][$key]);
                        $em = new EntityRepository();
                        $em->delete($value);
                    } else {
                        // if the quantity is greater than 1, decrease the quantity
                        if ($this->isLogged()) {
                            $value->setQuantite($value->getQuantite() - 1);
                            $em = new EntityRepository();
                            $em->update($value);
                            $_SESSION['articles'][$key] =  $value;
                        } else {
                            $_SESSION['articles'][$key] =  $value->setQuantite($value->getQuantite() - 1);
                        }
                    }
                    break;
                }
            }
        }
    }




    public function getCartPrice()
    {
        $total = 0;
        if (isset($_SESSION['articles'])) {
            foreach ($_SESSION['articles'] as $article) {
                $total += $article->getManga()->getPrix() * $article->getQuantite();
            }
        }
        return $total;
    }

    public function getCartQuantity()
    {
        $total = 0;
        if (isset($_SESSION['articles'])) {
            foreach ($_SESSION['articles'] as $article) {
                $total += $article->getQuantite();
            }
        }
        return $total;
    }

    public function setCommande($commande)
    {
        $_SESSION['commande'] = $commande;
        $this->setCommandsToAllArticles();
    }



    public function setCommandsToAllArticles()
    {
        if (isset($_SESSION['commande'])) {

            $currentCommande = $_SESSION['commande'];
            
            // restore from the database the articles           
            $em = new EntityRepository();
            function triageOfArticles($value)
            {
                return (new EntityRepository)->select(new DetailCommande(intval($value["ID_DETAILCOMMANDE"])));
            } 
            if($_SESSION['articles']) {
                foreach ($_SESSION['articles'] as $key => $article) {
                    // handle if the articles is already in the database or not
                    // if the article is already in the database, we do nothing more
                    // if the article is not in the database, we add it
                    $currentArticle = $em->findOneBy("detailcommande", ["ID_MANGA" => $article->getManga()->getId(), "ID_COMMANDE" => $currentCommande->getId()]);
                    if (!$currentArticle) {
                        // add the id after the insert
                        $article->setId(intval($em->insert($article)))
                            ->setCommande($currentCommande);
                        $_SESSION['articles'][$key] = $article;
                    }
                }
            }
            
            $articles = array_map("triageOfArticles", $em->findBy("detailcommande", ["ID_COMMANDE" => $currentCommande->getId()]));
            // add the articles to the session
            foreach ($articles as $article) {
                $this->addArticle($article);
            }
            
            
        }
    }
}
