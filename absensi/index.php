<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbsenceOS - Document</title>
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
            <h1>Absensi</h1>
        </div>
        <section id="time" class="time-container">
            <p>Sekarang Waktu Menunjukkan:</p>
            <h1><span id="server-time"></span></h1>
            <a href="" class="btn-primary">Mulai Absensi</a>
        </section>
        <section id="log" class="log-container">
            <h1>Log</h1>
            <table>
                <thead>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Waktu</th>
                </thead>
                <tr>
                    <td>Budiono</td>
                    <td>Siswa</td>
                    <td>2024-05-28 22:40:47</td>
                </tr>
                <tr>
                    <td>Susilo</td>
                    <td>Guru</td>
                    <td>2024-05-28 22:40:47</td>
                </tr>
            </table>
        </section>
    </div>
</body>

</html>