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

$search = $_GET['search'] ?? '';

if ($search !== '') {

    $data = array_filter($data, function ($row) use ($search) {

        return
            stripos($row['wilayah'], $search) !== false ||
            stripos($row['tanggal'], $search) !== false ||
            stripos($row['kondisi_cuaca'], $search) !== false ||
            stripos($row['arah_angin'], $search) !== false;

    });

}

$data = array_reverse($data);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Data Cuaca - BMKG</title>

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

            <a href="dashboard.php">
                🏠 Dashboard
            </a>

            <a href="data_cuaca.php" class="active">
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

            <strong>Data Cuaca</strong>

            <div id="clock"></div>

        </header>


        <section class="panel">

            <div class="panel-header">

                <div>

                    <h2>Data Monitoring Cuaca</h2>

                    <p>
                        Daftar data cuaca yang tersimpan.
                    </p>

                </div>

            </div>


            <form method="GET" class="search">

                <input
                    type="text"
                    name="search"
                    placeholder="Cari wilayah, tanggal, kondisi..."
                    value="<?= htmlspecialchars($search) ?>"
                >

                <button type="submit" class="btn">
                    Cari
                </button>

                <a href="data_cuaca.php" class="btn">
                    Reset
                </a>

            </form>


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
                        <th>Curah Hujan</th>
                        <th>Angin</th>
                        <th>Kondisi</th>

                    </tr>

                    </thead>

                    <tbody>

                    <?php if (empty($data)): ?>

                        <tr>

                            <td colspan="9">
                                Data tidak ditemukan.
                            </td>

                        </tr>

                    <?php else: ?>

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
                                    <?= $row['kecepatan_angin'] ?>
                                    km/jam
                                    <br>
                                    <?= htmlspecialchars($row['arah_angin']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($row['kondisi_cuaca']) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

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