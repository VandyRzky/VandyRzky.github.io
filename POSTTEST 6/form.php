<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
    $nama = htmlspecialchars($_GET['nama']);
    $email = htmlspecialchars($_GET['email']);
    $telp = htmlspecialchars($_GET['telp']);
    $kamera = htmlspecialchars($_GET['kamera']);
    
    echo "Nama: $nama<br>";
    echo "E-mail: $email<br>";
    echo "Telp: $telp<br>";
    echo "Kamera Favorit: $kamera<br>";
     ?>
</body>
</html>