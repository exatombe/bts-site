<?php
include $_SERVER['DOCUMENT_ROOT'] . '/src/manager/search.php';
// test
$search = new SearchManager();
if($_SERVER['REQUEST_METHOD'] === "GET"){
    if(isset($_GET['product'])){
        $product = $_GET['product'];
        echo $search->search($product);
    }else{
        echo json_encode(["error" => "Aucun résultat trouvé"]);
    }
}elseif($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['product'])){
        $product = $_POST['product'];
        echo $search->search($product);
    }else{
        echo json_encode(["error" => "Aucun résultat trouvé"]);
    }
}else{
    echo json_encode(["error" => "Erreur"]);
}
