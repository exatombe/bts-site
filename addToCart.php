<?php
    session_start();

    require_once $_SERVER['DOCUMENT_ROOT'] . '/src/manager/session.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/src/repository/entityRepository.php';
    $session = new SessionManager();

    if(isset($_GET['id'])){
        $em = new EntityRepository();
        $manga = $em->select(new Manga(intval($_GET['id'])));
        $session->addArticle($manga); 
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else{
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }