<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TD</title>
	 <!--Chart.js JS CDN--> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- ajout du plugin chartjs pour les courbes de tendances -->
     <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline/dist/chartjs-plugin-trendline.min.js"></script>

    
</head>
<body>

	<h1>TD</h1>

	<?php
		require 'connect_BDD.php';	
		
			// $datas=$pdo -> prepare("");

			// $datas -> execute();

			// $results = $datas -> fetchAll( PDO::FETCH_ASSOC);

     

	?>

        <div style="height: 800px;">
              <canvas id="line_chart">Désolé, votre navigateur ne prend pas en charge &lt;canvas&gt;.</canvas>
        </div>



        <script type="text/javascript">

		     new Chart(document.getElementById("line_chart"), {
                type: 'line',
                data: {
                  labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
                  datasets: [{ 
                      data: [86,114,106,106,107,111,133,221,783,2478],
                      label: "Africa",
                      backgroundColor : "#8e5ea2",
                      borderColor: "#3e11cd",
                      fill: true,

                    }
                    ]
                },
                options: {
                  elements: {
                      point: {
                        pointRadius: 5,
                      },
                      line: {
                        tension: 0.2
                      }
                    },
                  responsive: true,
                  maintainAspectRatio: true 
                }
              });


        </script>

</body>
</html>