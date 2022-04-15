<?php
include $_SERVER['DOCUMENT_ROOT'] . '/src/manager/search.php';
// test
$search = new SearchManager();
if($_SERVER['REQUEST_METHOD'] === "GET"){
    if(isset($_GET['nom'])){
        $product = $_GET['nom'];
        echo $search->searchAuteur($product);
    }else{
        echo json_encode(["error" => "Aucun résultat trouvé"]);
    }
}elseif($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['nom'])){
        $product = $_POST['nom'];
        echo $search->searchAuteur($product);
    }else{
        echo json_encode(["error" => "Aucun résultat trouvé"]);
    }
}else{
    echo json_encode(["error" => "Erreur"]);
}
