<?php require('../config/protector.php') ?>

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
    include('../config.php');
    ?>
</head>

<body>
    <?php
    include('../components/sidebar.php');
    ?>
    <div class="content">
        <div class="top">
            <h1>Selamat datang, <?php echo $_SESSION['username']; ?>!</h1>
            <p>Sekarang waktu menunjukkan: <span id="server-time"></span></p>
        </div>
        <h2>Status Siswa Hari Ini</h2>
        <section id="summary" class="summary-container">
            <?php
            $query = "SELECT COUNT(DISTINCT student_nisn) AS total_students FROM presence_log WHERE DATE(created_at) = CURDATE()";

            $result = mysqli_query($conn, $query);
            if ($result) {
                $row = mysqli_fetch_assoc($result);

                $totalStudents = $row['total_students'];
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            $query2 = "SELECT COUNT(DISTINCT nisn) AS total_absent_students FROM student WHERE nisn NOT IN (SELECT DISTINCT student_nisn FROM presence_log WHERE DATE(created_at) = CURDATE())";

            $result2 = mysqli_query($conn, $query2);
            if ($result2) {
                $row2 = mysqli_fetch_assoc($result2);

                $totalAbsentStudents = $row2['total_absent_students'];
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            mysqli_close($conn);
            ?>
            <div class='summary-item'>
                <strong>Telah Absensi</strong>
                <h1><?php echo $totalStudents ?></h1>
            </div>
            <div class="summary-item">
                <strong>Belum Absen</strong>
                <h1><?php echo $totalAbsentStudents ?></h1>
            </div>
        </section>
        <h2>Status Siswa Minggu Ini</h2>
        <section id="summary" class="summary-container">
            <div class="summary-item">
                <strong>Rata-rata Absensi</strong>
                <h1>25</h1>
            </div>
            <div class="summary-item">
                <strong>Rata-rata Sakit</strong>
                <h1>1</h1>
            </div>
        </section>
    </div>
</body>

</html>