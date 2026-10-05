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

    <title>Laporan Cuaca - BMKG</title>

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

            <a href="prediksi.php">🔮 Prediksi</a>

            <a href="laporan.php" class="active">
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

            <strong>Laporan Cuaca</strong>

            <div id="clock"></div>

        </header>


        <section class="panel report">

            <div class="panel-header">

                <div>

                    <h2>
                        Laporan Monitoring Cuaca
                    </h2>

                    <p>
                        Rekapitulasi data cuaca yang tersedia.
                    </p>

                </div>

                <button
                    onclick="window.print()"
                    class="btn">

                    🖨️ Cetak

                </button>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                    <tr>

                        <th>No</th>
                        <th>Wilayah</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Suhu</th>
                        <th>Kelembapan</th>
                        <th>Hujan</th>
                        <th>Kondisi</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php $no = 1; ?>

                    <?php foreach ($data as $row): ?>

                        <tr>

                            <td><?= $no++ ?></td>

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
                                <?= $row['curah_hujan'] ?> mm
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