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
                        <option value="">A</option>
                        <option value="">B</option>
                        <option value="">C</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit">Tambah</button>
                </div>
            </form>
        </section>
    </div>
</body>

</html>