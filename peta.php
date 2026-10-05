<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Peta Cuaca - BMKG</title>

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

            <a href="peta.php" class="active">
                🗺️ Peta Cuaca
            </a>

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

            <strong>Peta Cuaca</strong>

            <div id="clock"></div>

        </header>


        <section class="panel">

            <h2>
                Monitoring Peta Indonesia
            </h2>

            <p>
                Tampilan peta dapat dikembangkan menjadi
                peta cuaca interaktif menggunakan data BMKG.
            </p>


            <div class="map-placeholder">

                <div class="map-title">
                    🇮🇩 INDONESIA
                </div>

                <div class="map-info">

                    <div>
                        📍 Jakarta
                    </div>

                    <div>
                        📍 Bandung
                    </div>

                    <div>
                        📍 Surabaya
                    </div>

                    <div>
                        📍 Medan
                    </div>

                    <div>
                        📍 Makassar
                    </div>

                    <div>
                        📍 Jayapura
                    </div>

                </div>

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