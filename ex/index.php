<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=sae303Test;charset=utf8", "root", "root");
}catch (PDOException $e) 
{ 
    die('Une erreur a été trouvée : '. $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAE303 test</title>
</head>
<body>
    <h1>Données météo de l'Ain</h1>
    <?php
        $ex1 = $bdd->query("SELECT DISTINCT `NOM_USUEL` FROM `01` ");
        
        // print_r($ex1);
        while($donnes = $ex1->fetch(PDO::FETCH_NUM))
        {
            $stations[] = $donnes[0];
        }
        print_r($stations);
    ?>
    <hr>
    <?php
        $ex2 = $bdd->query("SELECT DISTINCT `NOM_USUEL`, `ALTI` FROM `01` ");
        
        $altitude = [];
        while($donnes = $ex2->fetch(PDO::FETCH_NUM))
        {
            $altitude[$donnes[0]] = $donnes[1];
        }
        print_r($altitude);
    ?>
    <hr>
    <?php
        $ex3 = $bdd->query("SELECT  AAAAMM, RR FROM `01` WHERE NOM_USUEL = 'ANGLEFORT' AND AAAAMM <= '195112' ");
        $ex3 = $ex3->fetchAll(PDO::FETCH_NUM);
        print_r($ex3);
    ?>

    <hr>

    <form id="form" method="post" >
        <label for="NOM_USUEL_Select">STATION</label>
        <select name="NOM_USUEL" id="NOM_USUEL_Select">
            <?php
                $nomUsuel = $bdd->query("SELECT DISTINCT NOM_USUEL FROM `01` ");
                while($donnes = $nomUsuel->fetch(PDO::FETCH_NUM))
                {
                    ?>
                    <option value="<?=$donnes[0]?>"><?=$donnes[0]?></option>
                    <?php
                }
            ?>
        </select>
        <label for="dateInput">Date</label>
        <input type="date" name="date" id="dateInput">

        <input type="submit" value="Envoyer">
    </form>

    <?php
        if(!empty($_POST))
        {
            $date = date_parse($_POST["date"]);
            if($date["month"] < 10) $date["month"].="0";
            $stringDate = $date["year"].$date["month"];

            $req = $bdd->prepare("SELECT AVG(RR) FROM `01` WHERE NOM_USUEL = ? AND AAAAMM >= ? ");
            $req->execute([$_POST["NOM_USUEL"], $stringDate]);

            $donnes = $req->fetch(PDO::FETCH_NUM);

            echo "Voici la moyenne de RR pour la station ".$_POST["NOM_USUEL"] ." à partir de ".$_POST["date"].": ".$donnes[0];
        }
    ?>

    <canvas id="myChart"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let myChart = null;

        document.getElementById("form").addEventListener("submit", function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            fetch("getRR.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Extraire les dates et les valeurs RR des données
                const labels = data.map(item => item.AAAAMM);
                const rrValues = data.map(item => parseFloat(item.RR));

                // Si un chart existe déjà, le détruire pour nettoyer le canvas
                if (myChart) {
                    myChart.destroy();
                }

                const ctx = document.getElementById('myChart').getContext('2d');

                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Précipitations (RR)',
                            data: rrValues,
                            borderWidth: 1,
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            borderColor: 'rgba(54, 162, 235, 1)'
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'RR (Précipitations)'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Date (AAAAMM)'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            }
                        }
                    }
                });
            })
            .catch(error => console.error("Erreur :", error));
        });
        
    </script>
</body>
</html>