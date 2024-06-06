<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbsenceOS - Sedang Absensi</title>
    <link rel="stylesheet" href="../assets/css/absensiStyle.css">
    <?php
    include('../config/fonts.php');
    include('../config/icons.php');
    include('../config/js.php');
    require '../config.php';
    ?>
</head>

<body>
    <h1>Selamat Datang!</h1>
    <h2>Sekarang waktu menunjukkan:</h2>
    <h2><span id="server-time"></span></h2>
    <p>Silahkan melakukan absensi</p>

    <section id="absence-input" class="absence-form">
        <form id="absence-form" method="POST">
            <div class="form-group"><input type="text" name="nisn" id="nisn" placeholder="NISN" autofocus></div>
            <div class="form-group"><button type="submit" class="btn-primary">Absen</button></div>
        </form>
    </section>

    <section id="absence-report">
        <div class="report-card"></div>
    </section>

    <script>
        document.getElementById('absence-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            fetch('../lib/submitAbsence.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                        const reportCard = document.querySelector('.report-card');
                        reportCard.innerHTML = `
                        <p>NISN: ${data.data.student_nisn}</p>
                        <p>Nama: ${data.data.student_name}</p>
                        <p>Kelas: ${data.data.class_name}</p>
                        <p>Waktu Absensi: ${data.data.created_at}</p>
                    `;
                    } else {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>

</html>