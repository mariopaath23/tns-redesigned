<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbsenceOS - Beranda</title>
    <?php
    include('../config/css.php');
    include('../config/fonts.php');
    include('../config/icons.php');
    include('../config/js.php');
    ?>
</head>

<body>
    <?php
    include('../components/sidebar.php');
    ?>
    <div class="content">
        <div class="top">
            <h1>Selamat datang, admin!</h1>
            <p>Sekarang waktu menunjukkan: <span id="server-time"></span></p>
        </div>
        <h2>Status Siswa</h2>
        <section id="summary" class="summary-container">
            <div class="summary-item">
                <strong>Telah Absensi</strong>
                <h1>25</h1>
            </div>
            <div class="summary-item">
                <strong>Sakit</strong>
                <h1>1</h1>
            </div>
            <div class="summary-item">
                <strong>Izin</strong>
                <h1>5</h1>
            </div>
            <div class="summary-item">
                <strong>Alpa</strong>
                <h1>10</h1>
            </div>
        </section>
        <h2>Status Pengajar</h2>
        <section id="summary" class="summary-container">
            <div class="summary-item">
                <strong>Telah Absensi</strong>
                <h1>25</h1>
            </div>
            <div class="summary-item">
                <strong>Sakit</strong>
                <h1>1</h1>
            </div>
            <div class="summary-item">
                <strong>Izin</strong>
                <h1>5</h1>
            </div>
            <div class="summary-item">
                <strong>Alpa</strong>
                <h1>10</h1>
            </div>
        </section>
    </div>
</body>

</html>