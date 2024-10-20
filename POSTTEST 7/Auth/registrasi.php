<?php 
    require '../koneksi.php';

    if (isset($_POST['registrasi'])){
        $username = htmlspecialchars($_POST['nama']);
        $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        $role = $_POST['role'];

        $checkUsername = "SELECT * FROM akun WHERE username = '$username'";
        $usernameResult = mysqli_query($conn, $checkUsername);
        if(mysqli_num_rows($usernameResult) > 0){
            echo "
            <script>
            alert('Username sudah digunakan!');
            document.location.href = 'registrasi.php';
            </script>
            ";
        }else{
            $insertUserSql = "INSERT INTO akun (username, pass_akun, role_akun) VALUES ('$username', '$password', '$role')";
            if (mysqli_query($conn, $insertUserSql)){
                echo "<script>
                alert('Berhasil melakukan registrasi!');
                document.location.href = 'login.php';
                </script>";
            }else{
                echo "<script>
                alert('Gagal melakukan registrasi!');
                document.location.href = 'registrasi.php';
                </script>";
            }
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
    <title>Registrasi</title>
</head>
<body>
    <section id="login">
        <div class="login-container">
            <div class="login-judul">
                <p>Registrasi</p>
            </div>
    
            <div class="login-form">
                <form action="" method="post">
                    <input type="text" placeholder="Username" name="nama" required>
                    <input type="password" placeholder="Password" name="password" required>
                    
                    <select name="role" id="role">
                        <option value="" disabled selected>Pilih Role..</option>
                        <option name="role" value="admin">Admin</option>
                        <option name="role" value="user">User</option>
                    </select>
                    
                    <input type="submit" value="Registrasi" name="registrasi">

                </form>
            </div>
            
        </div>
    </section>
</body>
</html>