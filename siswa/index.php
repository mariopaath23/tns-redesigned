<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbsenceOS - Siswa</title>
    <?php
    include('../config/css.php');
    include('../config/fonts.php');
    include('../config/icons.php');
    include('../config/js.php');
    require '../config.php';
    $getClass = query("SELECT * FROM class");
    ?>
</head>

<body>
    <?php
    include('../components/sidebar.php');
    ?>
    <div class="content">
        <div class="top">
            <h1>Siswa</h1>
        </div>
        <section id="add-siswa" class="form-container">
            <h1>Tambah Data Siswa</h1>
            <form action="../lib/addSiswa.php" method="POST">
                <div class="form-group">
                    <label for="nisn">NISN</label>
                    <input type="text" name="nisn" id="nisn" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="student_name" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="id_kelas">Kelas</label>
                    <select name="class_uuid" id="id_kelas" required>
                        <option value="">--Pilih Kelas--</option>
                        <?php foreach ($getClass as $class) : ?>
                            <option value="<?= htmlspecialchars($class['uuid'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($class['class_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit">Tambah</button>
                </div>
            </form>
        </section>

        <section id="data" class="data-container">
            <h1>Data</h1>
            <table>
                <thead>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </thead>
                <?php
                $students = query("SELECT student_name, nisn, class_name FROM student JOIN class ON student.class_uuid = class.uuid ORDER BY nisn ASC");
                foreach ($students as $student) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($student['nisn'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($student['student_name'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>" . htmlspecialchars($student['class_name'], ENT_QUOTES, 'UTF-8') . "</td>";
                    echo "<td>";
                    echo "<a href='#' class='btn-ubah'>Ubah</a>";
                    echo "<a href='#' class='btn-hapus'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </section>
    </div>
</body>

</html>