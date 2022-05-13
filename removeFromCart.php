<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/repository/entityRepository.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/manager/session.php';
session_start();


$session = new SessionManager();

if (isset($_GET['id'])) {
    $em = new EntityRepository();
    $manga = $em->select(new Manga(intval($_GET['id'])));
    $article = new DetailCommande();
    $article->setManga($manga);
    $session->removeArticle($article);
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("Location: /");
    }
} else {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        header("Location: /");
    }
}
