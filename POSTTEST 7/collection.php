<?php 
require "koneksi.php"; 

$sql = mysqli_query($conn, "SELECT * FROM kamera");

session_start();
if(!isset($_SESSION['login']) || $_SESSION['role'] !== 'user'){
    echo "<script>
    alert('Anda belum login!');
    document.location.href = 'Auth/login.php';
    </script>";
}

$kamera = [];
while ($row = mysqli_fetch_assoc($sql)) {
    $kamera[] = $row;
}

if (isset($_GET['cari'])){
    $cari = htmlspecialchars($_GET['cari']);

    $sql = mysqli_query($conn, "SELECT * FROM kamera WHERE nama LIKE '%$cari%'");
    $kamera = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $kamera[] = $row;
    }

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
            <a href="Auth/logOut.php">
                <button>LOGOUT</button>
            </a>
        </div>
    </nav>

    <section id="search">
        <form action="" method="get">
            <input type="text" name="cari" id="cari" placeholder="Nama kamera">
            <button type="submit">Cari</button>

        </form>
    </section>

    <section id="collection">
        <div class="collection-container">
        <?php foreach($kamera as $kmr): ?>
            <div class="collection-item">
                <img src="uploads/<?php echo $kmr['foto']; ?>" alt="Gambar Kamera" class="item-gambar">
                <p class="item-judul"><?php echo $kmr['nama']; ?></p>
                <p class="item-desc"><?php echo $kmr['deskripsi']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>