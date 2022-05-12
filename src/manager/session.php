<?php

class SessionManager{

    public function getUser(){
        return $_SESSION['user'];
    }

    public function addArticle($article){
        if(!isset($_SESSION['articles'])){
            $_SESSION['articles'] = array();
        }else{
          // check if the article is already in the cart
          // if it is, increase the quantity
            // if it isn't, add it to the cart
            $found = false;
            $currentSession = $_SESSION['articles'];
            foreach( $currentSession as $key => $value){
                if($value->getManga()->getId() == $article->getManga()->getId()){
                    $articleCurrent = $_SESSION['articles'][$key];
                    $_SESSION['articles'][$key]=  $articleCurrent->setQuantite($value->getQuantite() + $article->getQuantite());  
                    $found = true;
                    // add the article to the cart
                    break;
                }
            }
            if(!$found){
                array_push($_SESSION['articles'], $article);
            }
        }
    }
    
    public function getArticles(){
        if(isset($_SESSION['articles'])){
            return $_SESSION['articles'];
        }else{
            return array();
        }
    }

    // remove an article from the cart
    public function removeArticle($article){
        if(isset($_SESSION['articles'])){
            $currentSession = $_SESSION['articles'];
            foreach( $currentSession as $key => $value){
                if($value->getManga()->getId() == $article->getManga()->getId()){
                    // if the quantity is 1, remove the article from the cart
                    if($value->getQuantite() == 1){
                        unset($_SESSION['articles'][$key]);
                    }else{
                        // if the quantity is greater than 1, decrease the quantity
                        $_SESSION['articles'][$key]=  $value->setQuantite($value->getQuantite() - 1);
                    }
                    break;
                }
            }
        }
    }




    public function getCartPrice(){
        $total = 0;
        if(isset($_SESSION['articles'])){
            foreach($_SESSION['articles'] as $article){
                $total += $article->getManga()->getPrix() * $article->getQuantite();
            }
        }
        return $total;
    }

}