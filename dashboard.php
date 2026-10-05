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

$totalData = count($data);

$avgSuhu = $totalData > 0
    ? array_sum(array_column($data, 'suhu')) / $totalData
    : 0;

$avgKelembapan = $totalData > 0
    ? array_sum(array_column($data, 'kelembapan')) / $totalData
    : 0;

$totalHujan = $totalData > 0
    ? array_sum(array_column($data, 'curah_hujan'))
    : 0;

$avgAngin = $totalData > 0
    ? array_sum(array_column($data, 'kecepatan_angin')) / $totalData
    : 0;

$latest = !empty($data) ? end($data) : null;

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Monitoring BMKG</title>

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

            <a href="dashboard.php" class="active">
                🏠 Dashboard
            </a>

            <a href="data_cuaca.php">
                🌦️ Data Cuaca
            </a>

            <a href="grafik.php">
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

            <div>
                <strong>Dashboard</strong>
            </div>

            <div id="clock"></div>

        </header>


        <section class="hero">

            <div>

                <span>BADAN METEOROLOGI, KLIMATOLOGI, DAN GEOFISIKA</span>

                <h1>
                    Dashboard Monitoring Cuaca
                </h1>

                <p>
                    Sistem monitoring data cuaca untuk membantu
                    melihat kondisi atmosfer secara cepat dan informatif.
                </p>

            </div>

        </section>


        <section class="cards">

            <div class="stat-card">

                <span>Total Data</span>

                <h2>
                    <?= $totalData ?>
                </h2>

                <small>
                    Data cuaca tersimpan
                </small>

            </div>


            <div class="stat-card">

                <span>Rata-rata Suhu</span>

                <h2>
                    <?= number_format($avgSuhu, 1) ?> °C
                </h2>

                <small>
                    Suhu rata-rata
                </small>

            </div>


            <div class="stat-card">

                <span>Kelembapan</span>

                <h2>
                    <?= number_format($avgKelembapan, 1) ?> %
                </h2>

                <small>
                    Rata-rata kelembapan
                </small>

            </div>


            <div class="stat-card">

                <span>Curah Hujan</span>

                <h2>
                    <?= number_format($totalHujan, 1) ?> mm
                </h2>

                <small>
                    Total curah hujan
                </small>

            </div>

        </section>


        <section class="grid-2">

            <div class="panel">

                <h2>Kondisi Cuaca Terbaru</h2>

                <?php if ($latest): ?>

                    <div class="condition">

                        <div class="condition-icon">
                            🌤️
                        </div>

                        <div>

                            <h3>
                                <?= htmlspecialchars($latest['kondisi_cuaca']) ?>
                            </h3>

                            <p>
                                <?= htmlspecialchars($latest['wilayah']) ?>
                            </p>

                            <strong>
                                <?= $latest['suhu'] ?> °C
                            </strong>

                        </div>

                    </div>

                <?php else: ?>

                    <p>
                        Belum ada data cuaca.
                    </p>

                <?php endif; ?>

            </div>


            <div class="panel">

                <h2>Informasi Angin</h2>

                <?php if ($latest): ?>

                    <div class="mini-grid">

                        <div>
                            <span>Kecepatan</span>
                            <strong>
                                <?= $latest['kecepatan_angin'] ?> km/jam
                            </strong>
                        </div>

                        <div>
                            <span>Arah</span>
                            <strong>
                                <?= htmlspecialchars($latest['arah_angin']) ?>
                            </strong>
                        </div>

                        <div>
                            <span>Kelembapan</span>
                            <strong>
                                <?= $latest['kelembapan'] ?>%
                            </strong>
                        </div>

                        <div>
                            <span>Waktu</span>
                            <strong>
                                <?= $latest['waktu'] ?>
                            </strong>
                        </div>

                    </div>

                <?php endif; ?>

            </div>

        </section>


        <section class="panel">

            <div class="panel-header">

                <div>
                    <h2>Data Cuaca Terbaru</h2>
                    <p>Data monitoring yang tersimpan pada sistem.</p>
                </div>

                <a href="data_cuaca.php" class="btn">
                    Lihat Semua
                </a>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                    <tr>

                        <th>Wilayah</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Suhu</th>
                        <th>Kelembapan</th>
                        <th>Kondisi</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php

                    $latestData = array_reverse($data);

                    $latestData = array_slice($latestData, 0, 5);

                    ?>

                    <?php foreach ($latestData as $row): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($row['wilayah']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row['tanggal']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($row['waktu']) ?>
                            </td>

                            <td>
                                <?= $row['suhu'] ?> °C
                            </td>

                            <td>
                                <?= $row['kelembapan'] ?>%
                            </td>

                            <td>
                                <?= htmlspecialchars($row['kondisi_cuaca']) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </section>


        <footer>
            Monitoring BMKG &copy; <?= date('Y') ?>
        </footer>

    </main>

</div>


<script src="assets/js/app.js"></script>

</body>

</html>