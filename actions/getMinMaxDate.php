<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'database.php';
    $nomUsuel = $_POST["nomUsuel"];
    $result = $bdd->query("SELECT  MIN(AAAAMM), MAX(AAAAMM) FROM `sae303_05` WHERE NOM_USUEL ='". $nomUsuel . "'");
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}else{
    header("Location: ../index.php");
}
