<?php

$dataFile = __DIR__ . "/data/cuaca.json";

$data = [];

if (file_exists($dataFile)) {

    $json = file_get_contents($dataFile);

    $data = json_decode($json, true);

    if (!is_array($data)) {
        $data = [];
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Grafik Cuaca - BMKG</title>

    <link rel="stylesheet"
          href="assets/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<div class="app">

    <aside class="sidebar">

        <div class="brand">

            <h2>BMKG</h2>

            <span>Monitoring Cuaca</span>

        </div>

        <nav>

            <a href="dashboard.php">
                🏠 Dashboard
            </a>

            <a href="data_cuaca.php">
                🌦️ Data Cuaca
            </a>

            <a href="grafik.php" class="active">
                📊 Grafik
            </a>

            <a href="monitoring.php">
                📡 Monitoring
            </a>

            <a href="peta.php">
                🗺️ Peta Cuaca
            </a>

            <a href="prediksi.php">
                🔮 Prediksi
            </a>

            <a href="laporan.php">
                📄 Laporan
            </a>

        </nav>

        <div class="sidebar-bottom">

            <a href="logout.php">
                🚪 Logout
            </a>

        </div>

    </aside>


    <main class="main">

        <header class="topbar">

            <strong>Grafik Cuaca</strong>

            <div id="clock"></div>

        </header>


        <section class="panel">

            <h2>Grafik Suhu</h2>

            <canvas id="suhuChart"></canvas>

        </section>


        <section class="panel">

            <h2>Grafik Kelembapan</h2>

            <canvas id="kelembapanChart"></canvas>

        </section>


        <section class="panel">

            <h2>Grafik Curah Hujan</h2>

            <canvas id="hujanChart"></canvas>

        </section>


        <footer>
            Monitoring BMKG &copy; <?= date('Y') ?>
        </footer>

    </main>

</div>


<script>

const dataCuaca = <?= json_encode(array_values($data)) ?>;

const labels = dataCuaca.map(item =>
    item.wilayah + " " + item.waktu
);

const suhu = dataCuaca.map(item =>
    Number(item.suhu)
);

const kelembapan = dataCuaca.map(item =>
    Number(item.kelembapan)
);

const hujan = dataCuaca.map(item =>
    Number(item.curah_hujan)
);


new Chart(document.getElementById("suhuChart"), {

    type: "line",

    data: {

        labels: labels,

        datasets: [{

            label: "Suhu (°C)",

            data: suhu,

            tension: 0.3,

            fill: false

        }]

    }

});


new Chart(document.getElementById("kelembapanChart"), {

    type: "line",

    data: {

        labels: labels,

        datasets: [{

            label: "Kelembapan (%)",

            data: kelembapan,

            tension: 0.3,

            fill: false

        }]

    }

});


new Chart(document.getElementById("hujanChart"), {

    type: "bar",

    data: {

        labels: labels,

        datasets: [{

            label: "Curah Hujan (mm)",

            data: hujan

        }]

    }

});

</script>


<script src="assets/js/app.js"></script>

</body>

</html>