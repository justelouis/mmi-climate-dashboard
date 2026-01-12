<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'database.php';
    $result = $bdd->query("SELECT DISTINCT NOM_USUEL, LAT, LON, ALTI FROM `sae303_05` ");
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}else{
    header("Location: ../index.php");
}
