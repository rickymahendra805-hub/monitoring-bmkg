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

$wilayah = [];

foreach ($data as $row) {

    $nama = $row['wilayah'];

    $wilayah[$nama] = $row;

}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Monitoring Wilayah - BMKG</title>

    <link rel="stylesheet"
          href="assets/css/style.css">

</head>

<body>

<div class="app">

    <aside class="sidebar">

        <div class="brand">

            <h2>BMKG</h2>

            <span>Monitoring Cuaca</span>

        </div>

        <nav>

            <a href="dashboard.php">🏠 Dashboard</a>

            <a href="data_cuaca.php">🌦️ Data Cuaca</a>

            <a href="grafik.php">📊 Grafik</a>

            <a href="monitoring.php" class="active">
                📡 Monitoring
            </a>

            <a href="peta.php">🗺️ Peta Cuaca</a>

            <a href="prediksi.php">🔮 Prediksi</a>

            <a href="laporan.php">📄 Laporan</a>

        </nav>

        <div class="sidebar-bottom">

            <a href="logout.php">
                🚪 Logout
            </a>

        </div>

    </aside>


    <main class="main">

        <header class="topbar">

            <strong>Monitoring Wilayah</strong>

            <div id="clock"></div>

        </header>


        <section class="hero">

            <div>

                <span>MONITORING CUACA</span>

                <h1>
                    Kondisi Cuaca Wilayah
                </h1>

                <p>
                    Monitoring kondisi cuaca berdasarkan
                    data yang tersedia.
                </p>

            </div>

        </section>


        <section class="region-grid">

            <?php foreach ($wilayah as $nama => $row): ?>

                <div class="panel">

                    <h2>
                        <?= htmlspecialchars($nama) ?>
                    </h2>

                    <h1>
                        <?= $row['suhu'] ?> °C
                    </h1>

                    <p>
                        <?= htmlspecialchars($row['kondisi_cuaca']) ?>
                    </p>

                    <hr>

                    <p>
                        Kelembapan:
                        <strong>
                            <?= $row['kelembapan'] ?>%
                        </strong>
                    </p>

                    <p>
                        Angin:
                        <strong>
                            <?= $row['kecepatan_angin'] ?> km/jam
                        </strong>
                    </p>

                    <p>
                        Arah:
                        <strong>
                            <?= htmlspecialchars($row['arah_angin']) ?>
                        </strong>
                    </p>

                </div>

            <?php endforeach; ?>

        </section>


        <footer>
            Monitoring BMKG &copy; <?= date('Y') ?>
        </footer>

    </main>

</div>

<script src="assets/js/app.js"></script>

</body>

</html>