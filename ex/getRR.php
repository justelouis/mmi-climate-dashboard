<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=sae303Test;charset=utf8", "root", "root");
}catch (PDOException $e) 
{ 
    die('Une erreur a été trouvée : '. $e->getMessage());
}

if(empty($_POST)) die(json_encode([]));

$date = date_parse($_POST["date"]);
if($date["month"] < 10) $date["month"].="0";
$stringDate = $date["year"].$date["month"];

$req = $bdd->prepare("SELECT RR, AAAAMM FROM `01` WHERE NOM_USUEL = ? AND AAAAMM >= ? ORDER BY AAAAMM ASC");
$req->execute([$_POST["NOM_USUEL"], $stringDate]);

$donnes = $req->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($donnes);

?>