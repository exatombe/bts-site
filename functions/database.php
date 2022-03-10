<?php
$dsn = 'mysql:dbname=lemarchemanga;host=localhost';
$user = 'dbuser';
$password = 'dbpass';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);  
} catch(PDOException $e) {
    echo $e->getMessage();
}
                                                                                                                                                                                                                                                                                                                                                                                                                    
?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx