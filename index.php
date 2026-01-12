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
                <input type="month" name="" id="dateMinInput" min="1950-01" max="2025-12" value="1950-01"></div>
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
            <h2>Graph de temp</h2>
            <div id="tempGraphContainer">
                <canvas id="tempGraph" widht="100%"></canvas> 
            </div>
        </div>
        <div class="div4"> Je sais pas</div>
        <div class="div5"> 
            <h2>Graph de neige par raport a l altitude</h2>
            <canvas id="neigeGraph"></canvas>
        </div>
    </main>

    <script src="assets/scripts/script.js"></script>
</body>
</html>