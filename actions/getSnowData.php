<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once 'database.php';
    $nomUsuel = $_POST["nomUsuel"];
    $dateMin = $_POST["dateMin"];
    $dateMax = $_POST["dateMax"];
    $result = $bdd->query("SELECT
            SUBSTRING(AAAAMM, 1, 4) AS annee,
            ROUND(AVG(HNEIGEFTOT), 2) AS moyenneAnnuelle,
            ALTI,
            COUNT(HNEIGEFTOT) AS nb_mois
        FROM sae303_05
        WHERE QHNEIGEFTOT != '' 
            AND NOM_USUEL = '$nomUsuel'
            AND AAAAMM >= $dateMin 
            AND AAAAMM <= $dateMax
        GROUP BY
            SUBSTRING(AAAAMM, 1, 4), 
            ALTI
        ORDER BY
            annee");
    $result = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

}else{
    header("Location: ../index.php");
}