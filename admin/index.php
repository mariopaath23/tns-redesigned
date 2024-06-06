<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
</body>

</html>