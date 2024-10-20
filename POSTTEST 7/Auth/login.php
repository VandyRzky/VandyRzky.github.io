<?php 
require "../koneksi.php";

session_start();

if (isset($_POST['login'])){
    $username = htmlspecialchars($_POST['nama']);
    $password = htmlspecialchars($_POST['password']);

    $checkUsername = "SELECT * FROM akun WHERE username='$username'";
    $checkUsernameResult = mysqli_query($conn, $checkUsername);

    if (mysqli_num_rows($checkUsernameResult) === 1) {
        $akun = mysqli_fetch_assoc($checkUsernameResult);

        if(password_verify($password, $akun['pass_akun'])){
            $_SESSION['login'] = true;
            if($akun['role_akun'] === 'admin'){
                $_SESSION['role'] = 'admin';
                echo "<script>
                    alert('Login berhasil!');
                    document.location.href = '../admin/admin.php';
                </script>";
            }else{
                $_SESSION['role'] = 'user';
                echo "<script>
                    alert('Login berhasil!');
                    document.location.href = '../collection.php';
                </script>";
            }
        }else{
            echo "
            <script>
                alert('Password Salah!');
            </script>";
        }
    }else {
        echo "
        <script>
            alert('Username tidak ditemukan!');
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
    <link rel="stylesheet" href="../styles/style-login.css">
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
            
            <p class= "registrasi">Belum punya akun? <a href="registrasi.php">Registrasi</a></p>
        </div>
    </section>
</body>
</html>