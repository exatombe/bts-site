<?php

/**
 * Classe de base de la base donnée, (gére toute les requête globales)
 * @return Database
 */
class Database{
    private $db;
    private $error;
    function __construct()
    {   
     $dsn = 'mysql:dbname=lemarchedumanga;host=localhost';
     $user = 'root';
     $password = '';
        try {
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $dbh;
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
        }
    }
    
    /**
     * Faire une requête à la base de donnée (SELECT, ou autre...)
     */
    public function query(string $query,array $options = [])
    {
        try{
                if (count($options) == 0) {
                    $query = $this->db->prepare($query);
                    $query->execute($options);
                    return $query;
                } else {
                    $query = $this->db->prepare($query);
                    $query->execute($options);
                    return $query;
                }
        }catch(PDOException $e){
            $this->error = $e->getMessage();
        }

    }
    /**
     * Trouvé toute les donnée qui remplissent une ou plusieurs conditions
     */
    public function findBy(string $table, array $values){
        if(!$values){
            return "Error...";
        }else{
            $searchArr = [];
            foreach($values as $key=>$value){
                array_push($searchArr,$key."='".$value."'");
            }
            $search = implode( " && ", $searchArr );
            return Database::query("SELECT * FROM $table WHERE $search")->fetchAll();
        }
    }
    /**
     * Trouvé des donnée uniquement en fonction de leurs ID
     */
    public function find(string $table, int $ID){
        $collum = "ID_".strtoupper($table);
        try{
            return Database::query("SELECT * FROM $table WHERE $collum = $ID")->fetchAll();
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    /**
     * Trouvé des donnée en fonctions de donnée Key/Values
     * Exemple : 
     * $db->findOneBy("user",["ID_USER" => 1, "Email" => "random@gmail.com"]);
     */
    public function findOneBy(string $table,array $values){
        if(!$values){
            return "Error...";
        }else{
            $searchArr = [];
            foreach($values as $key=>$value){
                array_push($searchArr,$key."='".$value."'");
            }
            $search = implode( "&&", $searchArr );
            return Database::query("SELECT * FROM $table WHERE $search LIMIT 1")->fetch();
        }
    }
    /**
     * Affiché toute les données d'une table
     */
    public function findAll(string $table)
    {
        return Database::query("SELECT * FROM $table")->fetchAll();
    }
}

?>