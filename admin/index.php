<?php require('../config/protector.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbsenceOS - Admin</title>
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
            <h1>Pengaturan Admin</h1>
        </div>
        <section id="add-admin" class="form-container">
            <h1>Tambah Akun</h1>
            <form action="../lib/addAccount.php" method="post">
                <div class="form-group">
                    <input type="text" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    </select>
                </div>
                <div class="form-group">
                    <input type="password" name="konfPassword" id="konfpassword" placeholder="Konfirmasi Password" required>
                    </select>
                </div>
                <div class="form-group">
                    <select name="role_id" id="role_id" required>
                        <option value="">Pilih Role</option>
                        <option value="1">Admin</option>
                        <option value="2">Guru Piket</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-primary">Tambah</button>
                </div>
            </form>
        </section>

        <section class="data-container" id="admin">
            <h1>Data Admin</h1>
            <table>
                <thead>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </thead>
                <?php
                $admins = query("SELECT * FROM accounts");
                foreach ($admins as $admin) {
                    echo "<tr>";
                    echo "<td>" . $admin['username'] . "</td>";
                    if ($admin['role_id'] == 1) {
                        echo "<td>Admin</td>";
                    } else {
                        echo "<td>Guru Piket</td>";
                    }
                    echo "<td>" . $admin['created_at'] . "</td>";
                    echo "<td><a href='#' class='btn-tertiary'>Hapus</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </section>
    </div>
</body>

</html>