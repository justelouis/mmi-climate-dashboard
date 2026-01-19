<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=sae303;charset=utf8", "root", "root");
}catch (PDOException $e) 
{ 
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=db-cadixlou;charset=utf8", "usr-cadixlou", ".)Z+Zlrb^8gk");
    } catch (PDOException $e) {
        die('Une erreur a été trouvée : '. $e->getMessage());
    }
}