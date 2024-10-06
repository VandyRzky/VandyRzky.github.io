<?php 
require "koneksi.php"; 

$sql = mysqli_query($conn, "SELECT * FROM kamera");

$kamera = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $kamera[] = $row;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="styles/style-collection.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeeCam Collection</title>
</head>
<body>
    <nav id="navbar">
        <div class="nav-judul">
            <p>COLLECTION</p>
        </div>
        <div class="nav-login">
            <a href="login.php">
                <button>LOGIN</button>
            </a>
        </div>
    </nav>

    <section id="collection">
        <table class="tabel-kamera">
            <thead>
                <tr class="tabel-header">
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($kamera as $kmr): ?>
                <tr class= "tabel-desc">
                    <td><?php echo $kmr['nama']; ?></td>
                    <td><img src="uploads/<?php echo $kmr['foto']; ?>" alt="Gambar Kamera" class="upload" width="100"></td>
                    <td><?php echo $kmr['deskripsi']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </section>
</body>
</html>