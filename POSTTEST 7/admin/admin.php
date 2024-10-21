<?php 
require "../koneksi.php";

$sql = mysqli_query($conn, "SELECT * FROM kamera");

session_start();
if(!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin'){
    echo "<script>
    alert('Anda belum login!');
    document.location.href = '../Auth/login.php';
    </script>";
}

$kamera = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $kamera[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../styles/style-admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <section id="data-kamera">
        <div class="data-judul">
            <p>Data Kamera</p>
        </div>

        <div class="tambah-kamera">
            
            <a href="../Auth/logOut.php">
                <button>LOGOUT</button>
            </a>
            <a href="tambah.php">
                <button>Tambah Data Kamera</button>
            </a>
        </div>

        <table class="tabel-kamera">
            <thead>
                <tr class="tabel-header">
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($kamera as $kmr): ?>
                <tr class= "tabel-desc">
                    <td><?php echo $kmr['nama']; ?></td>
                    <td><img src="../uploads/<?php echo $kmr['foto']; ?>" alt="Gambar Kamera" class="upload" width="100"></td>
                    <td><?php echo $kmr['deskripsi']; ?></td>
                    <td class="edit-data">
                        <div class="edit">
                            <a href="edit.php?id=<?php echo $kmr['id']?>">
                                <button>
                                <i class="fa-solid fa-pen"></i>
                                </button>
                            </a>
                        </div>
                    </td>
                    <td class="hapus-data">
                        <div class="hapus">
                            <a href="hapus.php?id=<?php echo $kmr['id']?>" >
                                <button>
                                <i class="fa-solid fa-trash"></i>   
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </section>
</body>
</html>
