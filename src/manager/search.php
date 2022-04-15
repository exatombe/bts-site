<?php
include $_SERVER['DOCUMENT_ROOT'] . '/src/repository/database.php';
/**
 * Class Search Manager
 * 
 * ```php
 * $search = new SearchManager();
 * $search->search("manga");
 * ```
 */
class SearchManager extends Database{
    
    public function __construct(){
        parent::__construct();
    }

    public function search(string $product){
        $product = htmlspecialchars($product);
        $searchValues = parent::query("SELECT * FROM manga WHERE Titre LIKE '%$product%' OR Genre LIKE '%$product%' OR Editeur LIKE '%$product%'");
        if($searchValues->rowCount() > 0){
            $searchValues = $searchValues->fetchAll();
            return json_encode($searchValues);
        }else{
            return json_encode(["error" => "Aucun résultat trouvé"]);
        }
    }


}