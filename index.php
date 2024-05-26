<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1, initial-scale=1.0">
    <title>AbsenceOS - Login</title>

    <!-- CSS Import -->
    <link rel="stylesheet" href="assets/css/loginStyle.css">

    <!-- Font Setup -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Font Awesome 6.5.1 -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" 
    />
</head>
<body>
    <section class="login-container">
        <h1>Silahkan Login</h1>
        <form action="auth.php" method="post">
            <label for="username"><i class="fas fa-user"></i>
            </label>
            <input type="text" name="username" placeholder="Username" id="username" required>
            <label for="password"><i class="fas fa-lock"></i></label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <input type="submit" value="Login">
        </form>
    </section>

    <aside class="announcement-side">
        <h1>Pengumuman</h1>
        <section class="announce-container">
            <div class="announce-item">
                <h1>First release</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur natus cupiditate delectus nostrum, vel ratione? Doloremque, atque praesentium culpa, eius itaque soluta ipsum placeat est amet dignissimos eveniet asperiores aut!</p>
            </div>
            <div class="announce-item">
                <h1>Second release</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur natus cupiditate delectus nostrum, vel ratione? Doloremque, atque praesentium culpa, eius itaque soluta ipsum placeat est amet dignissimos eveniet asperiores aut!</p>
            </div>
            <div class="announce-item">
                <h1>Third release</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur natus cupiditate delectus nostrum, vel ratione? Doloremque, atque praesentium culpa, eius itaque soluta ipsum placeat est amet dignissimos eveniet asperiores aut!</p>
            </div>
            <div class="announce-item">
                <h1>Fourth release</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur natus cupiditate delectus nostrum, vel ratione? Doloremque, atque praesentium culpa, eius itaque soluta ipsum placeat est amet dignissimos eveniet asperiores aut!</p>
            </div>
        </section>
    </aside>
</body>
</html>