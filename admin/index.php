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
            <h1>Admin</h1>
        </div>
        <section id="add-admin" class="form-container">
            <h1>Tambah Admin</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                    </select>
                </div>
                <div class="form-group">
                    <label for="konfPassword">Konfirmasi Password</label>
                    <input type="password" name="konfPassword" id="konfpassword" required>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit">Tambah</button>
                </div>
            </form>
        </section>
    </div>
</body>

</html>