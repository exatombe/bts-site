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
        return $_SESSION['articles'];
    }

}