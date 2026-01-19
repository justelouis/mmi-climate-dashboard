<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Météo Hautes Alpes</title>

    <!-- Leaflet js -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

    <!-- Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="assets/styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline/dist/chartjs-plugin-trendline.min.js"></script>
</head>
<body>
    <header>
        <h1>Dashboard Météo des Hautes-Alpes </h1>
        <div>
        <img src="content/images/image.jpg" alt="">

        </div>
    </header>
    
    <main>
        <div class="div1"> 
            <div>
                <label for="dateMinInput">Date de début</label>
                <input type="month" name="dateMinInput" id="dateMinInput" min="1950-01" max="2025-12" value="1950-01">
            </div>
            <hr>
            <div>
                <label for="dateMaxInput">Date de fin</label>
                <input type="month" name="dateMaxInput" id="dateMaxInput" min="1950-01" max="2025-12"value="2020-12">
            </div>
        </div>

        <div class="div2">
            <div id="map"></div>
            <div id="retractButton">
                <button onclick=SwitchRetracteMap()> <span> < </span> </button>
            </div>
        </div>

        <div class="div3">
            <h2>Graphique des températures moyennes mensuelles</h2>
            <div>
                <span>Désolé, il n'y a pas de donnée dans cette station entre les dates demandés</span>
            </div>
            <div id="tempGraphContainer">
                <canvas id="tempGraph" widht="100%"></canvas> 
            </div>
        </div>

        <div class="div4"> 
            <h2>Récapitulatif</h2>
            <p>
                La ville de <span class="recapInfo">...</span> entre <span class="recapInfo">...</span> et <span class="recapInfo">...</span> 
            a connu une <span class="recapInfo">...</span> de <span class="recapInfo">...</span> pour sa température moyenne et une 
            <span class="recapInfo">...</span> de <span class="recapInfo">...</span> sur les chutes de neiges
            </p>
        </div>

        <div class="div5"> 
            <h2>Graphique des tombées de neige annuelles </h2>
            <div>
                <span>Désolé, il n'y a pas de donnée dans cette station entre les dates demandés</span>
            </div>
            <div id="snowGraphContainer">
                <canvas id="snowGraph"></canvas>
            </div>
        </div>
    </main>

    <script src="assets/scripts/script.js"></script>
</body>
</html>