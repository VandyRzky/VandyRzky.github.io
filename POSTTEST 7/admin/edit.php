<?php
require "../koneksi.php";

$id = $_GET['id'];


$query = mysqli_query($conn, "SELECT * FROM kamera WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['edit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $desc = htmlspecialchars($_POST['desc']);
    $fotoLama = $data['foto']; 

    if ($_FILES['foto']['name']) {
        $fotoBaruUpload = $_FILES['foto']['name'];
        $fotoTmp = $_FILES['foto']['tmp_name'];

        $file_ekstensi = pathinfo($fotoBaruUpload, PATHINFO_EXTENSION);
        $fotoBaru = date('Y-m-s_H-i-s').'.'.$file_ekstensi;

        $pathLama = "../uploads/" . $fotoLama;
        $pathBaru = "../uploads/" . $fotoBaru;

        
        if (file_exists($pathLama)) {
            unlink($pathLama);
        }

       
        move_uploaded_file($fotoTmp, $pathBaru);
    } else {
        $fotoBaru = $fotoLama;
    }


    $sql = "UPDATE kamera SET nama = ?, deskripsi = ?, foto = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nama, $desc, $fotoBaru, $id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Data berhasil diubah!');
            document.location.href = 'admin.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah!');
        </script>";
    }

    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style-edit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <title>Edit Kamera</title>
</head>
<body>

    <section id="edit-data">
        <div class="judul">
            <p>Edit Data Kamera</p>
        </div>

        <div class="form">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="text" value="<?php echo $data['nama']; ?>" id="nama" name="nama" required>
                <input type="text" value="<?php echo $data['deskripsi']; ?>" id="desc" name="desc" required>
                <div class="foto">
                    <label for="foto">Gambar Saat Ini</label><br>
                    <img src="../uploads/<?php echo $data['foto']; ?>" alt="Gambar Kamera" width="100"><br><br>
                    <label for="foto">Pilih Gambar Baru (jika ingin mengubah)</label>
                    <input type="file" name="foto" id="foto">
                </div>
                <input type="submit" value="Edit Data" name="edit" id="edit">
            </form>
        </div>
    </section>

</body>
</html>
