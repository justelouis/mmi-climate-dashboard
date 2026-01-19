<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'database.php';
    $nomUsuel = $_POST["nomUsuel"];
    $dateMin = $_POST["dateMin"];
    $dateMax = $_POST["dateMax"];
    $result = $bdd->query("SELECT 
        ROUND(AVG(TM),2) AS moyenneAnnuelle,
        SUBSTRING(AAAAMM,1,4) AS annee,
        COUNT(TM) AS nb_mois
        FROM `sae303_05` 
        WHERE NOM_USUEL = '$nomUsuel' 
        AND AAAAMM >= $dateMin 
        AND AAAAMM <= $dateMax 
        AND QTM !='' 
        GROUP BY SUBSTRING(AAAAMM,1,4)
        ORDER BY annee");
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

}else{
    header("Location: ../index.php");
}
