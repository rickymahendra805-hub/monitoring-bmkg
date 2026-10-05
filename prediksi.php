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

$latest = !empty($data) ? end($data) : null;

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Prediksi Cuaca - BMKG</title>

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

            <a href="monitoring.php">📡 Monitoring</a>

            <a href="peta.php">🗺️ Peta Cuaca</a>

            <a href="prediksi.php" class="active">
                🔮 Prediksi
            </a>

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

            <strong>Prediksi Cuaca</strong>

            <div id="clock"></div>

        </header>


        <section class="hero">

            <div>

                <span>PREDIKSI CUACA</span>

                <h1>
                    Informasi Prediksi
                </h1>

                <p>
                    Modul prediksi ini disiapkan untuk
                    pengembangan menggunakan data BMKG.
                </p>

            </div>

        </section>


        <section class="panel">

            <h2>
                Prediksi Wilayah
            </h2>

            <p>
                Saat ini sistem masih menggunakan data contoh.
                Nantinya modul ini dapat dihubungkan dengan
                data prediksi BMKG.
            </p>

            <?php if ($latest): ?>

                <div class="mini-grid">

                    <div>

                        <span>Wilayah</span>

                        <strong>
                            <?= htmlspecialchars($latest['wilayah']) ?>
                        </strong>

                    </div>

                    <div>

                        <span>Suhu Saat Ini</span>

                        <strong>
                            <?= $latest['suhu'] ?> °C
                        </strong>

                    </div>

                    <div>

                        <span>Kondisi</span>

                        <strong>
                            <?= htmlspecialchars($latest['kondisi_cuaca']) ?>
                        </strong>

                    </div>

                    <div>

                        <span>Kelembapan</span>

                        <strong>
                            <?= $latest['kelembapan'] ?>%
                        </strong>

                    </div>

                </div>

            <?php endif; ?>

        </section>


        <footer>
            Monitoring BMKG &copy; <?= date('Y') ?>
        </footer>

    </main>

</div>

<script src="assets/js/app.js"></script>

</body>

</html>