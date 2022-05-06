<?php

class SessionManager{

    public function addUser($user){
        $_SESSION['user'] = $user;
    }

    public function getUser(){
        return $_SESSION['user'];
    }

    public function addArticle($article){
        if(!isset($_SESSION['articles'])){
            $_SESSION['articles'] = array();
        }
        array_push($_SESSION['articles'], $article);
    }
    
    public function getArticles(){
        if(isset($_SESSION['articles'])){
            return $_SESSION['articles'];
        }else{
            return array();
        }
    }

    public function getCartPrice(){
        $total = 0;
        if(isset($_SESSION['articles'])){
            foreach($_SESSION['articles'] as $article){
                $total += $article->getPrix();
            }
        }
        return $total;
    }

}