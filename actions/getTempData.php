<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'database.php';
    $nomUsuel = $_POST["nomUsuel"];
    $dateMin = $_POST["dateMin"];
    $dateMax = $_POST["dateMax"];
    $result = $bdd->query("SELECT TM, AAAAMM FROM `sae303_05` WHERE NOM_USUEL = '$nomUsuel' AND AAAAMM >= $dateMin AND AAAAMM <= $dateMax AND QTM !='' ");
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

}else{
    header("Location: ../index.php");
}
