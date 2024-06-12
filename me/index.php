<?php require('../config/protector.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbsenceOS - Saya</title>
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
            <h1>Akun Saya</h1>
        </div>
        <section id="about-account" class="account-container">
            <div class="profile-card">
                <div class="profile-image">
                    <img src="../assets/default-profile.png" alt="Profile Picture" width="200">
                </div>
                <div class="profile-info">
                    <h3>Username: <?php echo $_SESSION['username']; ?></h1>
                        <p>Role: <?php
                                    if ($_SESSION['role'] == 1) {
                                        echo 'Admin';
                                    } elseif ($_SESSION['role'] == 2) {
                                        echo 'Guru Piket';
                                    }
                                    ?></p>
                        <p>Dibuat pada: <?php echo $_SESSION['created_at']; ?></p>
                </div>
            </div>
        </section>
        <section class="form-container" id="admin">
            <h1>Ubah Password</h1>
            <form action="../lib/updateAccount.php" method="post">
                <div class="form-group">
                    <input type="text" name="username" id="username" placeholder="<?php echo $_SESSION['username'] ?>" required disabled>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-primary">Ubah</button>
                </div>
        </section>
    </div>
</body>

</html>