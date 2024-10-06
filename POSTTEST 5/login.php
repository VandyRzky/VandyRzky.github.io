<?php 
require "koneksi.php";

if (isset($_POST['login'])){
    $nama = htmlspecialchars($_POST['nama']);
    $password = htmlspecialchars($_POST['password']);

    if ($nama == "admin" && $password == "admin"){
        echo "<script>
            alert('Login Berhasil!');
            document.location.href = 'admin/admin.php';
        </script>";
    } else{
        echo "<script>
            alert('Login Gagal!');
            document.location.href = 'login.php';
        </script>";
    }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="styles/style-login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <section id="login">
        <div class="login-container">
            <div class="login-judul">
                <p>Login</p>
            </div>
    
            <div class="login-form">
                <form action="" method="post">
                    <input type="text" placeholder="Username" name="nama" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <input type="submit" value="Login" name="login">
                </form>
            </div>
        </div>
    </section>
</body>
</html>