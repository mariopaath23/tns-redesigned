<header>
    <div class="navbar">
        <nav class="nav-list">
            <ul>
                <li>AbsenceOS</li>
                <li><a href="/tns-redesigned/beranda">Beranda</a></li>
                <li><a href="/tns-redesigned/absensi">Absensi</a></li>
                <li><a href="/tns-redesigned/siswa">Siswa</a></li>
                <li><a href="/tns-redesigned/kelas">Kelas</a></li>
                <li><a href="/tns-redesigned/me">Saya</a></li>
                <li><a href="/tns-redesigned/about">About</a></li>
                <li><a href="/tns-redesigned/lib/logout.php">Logout</a></li>
                <?php
                if ($_SESSION['role'] == 1) {
                    echo '<li><a href="/tns-redesigned/admin">Admin</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</header>