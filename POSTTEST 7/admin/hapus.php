<?php 
require "../koneksi.php";

$id = $_GET['id'];


$query = mysqli_query($conn, "SELECT foto FROM kamera WHERE id = $id");
$data = mysqli_fetch_assoc($query);
$foto = $data['foto']; 
$path = "../uploads/" . $foto;


if (file_exists($path)) {
    
    unlink($path);
}


$result = mysqli_query($conn, "DELETE FROM kamera WHERE id = $id");

if ($result) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        document.location.href = 'admin.php';
    </script>";
} else {
    echo "
    <script>
        alert('Data gagal dihapus!');
        document.location.href = 'admin.php';
    </script>";
}
?>
