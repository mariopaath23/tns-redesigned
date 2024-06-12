<?php require('../config/protector.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbsenceOS - Kelas</title>
    <?php
    include('../config/css.php');
    include('../config/fonts.php');
    include('../config/icons.php');
    include('../config/js.php');
    require '../config.php';
    ?>
</head>

<body>
    <?php
    include('../components/sidebar.php');
    ?>
    <div class="content">
        <div class="top">
            <h1>Kelas</h1>
        </div>
        <section id="add-kelas" class="form-container">
            <h1>Tambah Data Kelas</h1>
            <form action="../lib/addClass.php" method="POST">
                <div class="form-group">
                    <input type="text" name="class_name" id="nama" placeholder="Nama Kelas" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn-primary">Tambah</button>
                </div>
            </form>
        </section>
        <section id="data" class="data-container">
            <h1>Data</h1>
            <table>
                <thead>
                    <th>Nama</th>
                    <th>Jumlah Siswa</th>
                    <th>Terakhir diubah</th>
                    <th>Aksi</th>
                </thead>
                <?php
                $classes = query("SELECT class_name, COUNT(student.class_uuid) AS jumlah_siswa, MAX(student.updated_at) AS terakhir_diubah FROM class LEFT JOIN student ON class.uuid = student.class_uuid GROUP BY class.uuid ORDER BY class_name ASC");
                foreach ($classes as $class) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($class['class_name'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>";
                    if ($class['jumlah_siswa'] == 0) {
                        echo "Belum ada siswa";
                    } else {
                        echo htmlspecialchars($class['jumlah_siswa'], ENT_QUOTES, 'UTF-8');
                    }
                    echo "</td>";
                    echo "<td>" . htmlspecialchars($class['terakhir_diubah'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>";
                    echo "<a href='#' class='btn-secondary'>Ubah</a>";
                    echo "<a href='#' class='btn-tertiary'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </section>
    </div>
</body>

</html>