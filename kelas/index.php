<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="top">
        <h1>Kelas</h1>
    </div>

    <section id="add-kelas" class="form-container">
        <h1>Tambah Data Kelas</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="class_name" id="nama" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Tambah</button>
            </div>
        </form>
    </section>

    <section id="list-kelas" class="data-container">
        <h1>Daftar Kelas</h1>

    </section>
</body>

</html>