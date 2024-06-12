<?php require('../config/protector.php') ?>

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
    include('../config.php');
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
            <a href="../absensi/absensi-page.php" class="btn-primary" target="_blank" onclick="window.open('absensi-page.php', 'Absensi', 'fullscreen=yes'); return false;">Mulai Absensi</a>
        </section>
        <section id="log" class="log-container">
            <h1>Log</h1>
            <h3>Filter</h3>
            <form action="index.php" method="get">
                <input type="date" name="date" placeholder="Date">
                <input type="submit" value="Filter">
            </form>
            <table>
                <thead>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Kelas</th>
                    <th>Kehadiran</th>
                    <th>Waktu Absensi</th>
                </thead>
                <tbody>
                    <?php
                    $date = $_GET['date'] ?? date('Y-m-d');
                    $date = mysqli_real_escape_string($conn, $date);

                    $getAbsensi = query("SELECT presence_log.*, student.student_name, class.class_name 
                                         FROM presence_log 
                                         INNER JOIN student ON presence_log.student_nisn = student.nisn 
                                         INNER JOIN class ON student.class_uuid = class.uuid
                                         WHERE DATE(presence_log.created_at) = '$date'");
                    foreach ($getAbsensi as $absensi) :
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($absensi['student_name'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($absensi['student_nisn'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td><?= htmlspecialchars($absensi['class_name'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                            <td>
                                <?php
                                $created_at = strtotime($absensi['created_at'] ?? '');
                                $hour = date('H', $created_at);
                                if ($hour >= 7 && $hour < 14) {
                                    echo 'Terlambat';
                                } else {
                                    echo 'Hadir';
                                }
                                ?>
                            </td>
                            <td><?= htmlspecialchars($absensi['created_at'] ?? '', ENT_QUOTES, 'UTF-8') ?></td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </section>
    </div>
</body>

</html>