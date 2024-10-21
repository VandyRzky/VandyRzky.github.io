<?php 
require "../koneksi.php";

session_start();
if(!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin'){
    echo "<script>
    alert('Anda belum login!');
    document.location.href = '../Auth/login.php';
    </script>";
}

if (isset($_POST['tambah'])){
    $nama = htmlspecialchars($_POST['nama']);
    $desc = htmlspecialchars($_POST['desc']);

    $gambar = $_FILES['foto']['name']; 
    $gambartmp = $_FILES['foto']['tmp_name']; 


    $file_ekstensi = pathinfo($gambar, PATHINFO_EXTENSION);
    $nama_file_baru = date('Y-m-s_H-i-s').'.'.$file_ekstensi;
    
    
    $target_dir = "../uploads/";
    $target_file = $target_dir . $nama_file_baru; 

    
    if (move_uploaded_file($gambartmp, $target_file)) {
        
        $sql = "INSERT INTO kamera (nama, deskripsi, foto) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nama, $desc, $nama_file_baru); 
        
        if ($stmt->execute()) {
            echo "<script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = 'admin.php';
            </script>";
        } else {
            echo "<script>
            alert('Data Gagal Ditambahkan!');
            document.location.href = 'admin.php';
            </script>";
        }
        
        $stmt->close();
    } else {
        echo "<script>
        alert('Gagal Mengupload Gambar!');
        </script>";
    }

    $conn->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../styles/style-tambah.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kamera</title>
</head>
<body>

    <section id="tambah-data">
        <div class="judul">
            <p>Tambah Data Kamera</p>
        </div>

        <div class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" placeholder="Nama Kamera" id="nama" name="nama" required>
                <input type="text" placeholder="Deskripsi" id="desc" name="desc" required>
                <div class="foto">
                    <label for="foto">Masukkan Gambar Kamera</label>
                    <input type="file" name="foto" id="foto" value="Gambar Kamera" required>
                </div>
                <input type="submit" value="Tambah Data" name="tambah" id="tambah">
            </form>
        </div>
    </section>


</body>
</html>