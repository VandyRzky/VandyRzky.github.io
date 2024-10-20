<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>SeeCam</title>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <ul>
                <li><a href="#home">HOME</a></li>
                <li><a href="#collection">COLLECTION</a></li>
                <li><a href="#about">ABOUT</a></li>
                <li><a href="Auth/login.php">LOGIN</a></li>
            </ul>
        </div>

        <div class="nav-hamburger">
            <input type="checkbox">
            <spam></spam>
            <spam></spam>
            <spam></spam>
        </div>
    </nav>

    <section id="home">
        <div class="home-container">
            <div class="home-desc">
                <p class="desc-head">Abadikan setiap momen dengan indah</p>
                <p class="desc-body">Lihat berbagai kamera terbaik yang cocok untukmu!!</p>
                <p class="desc-link"><a href="">Temukan kameramu <i class="fa-solid fa-arrow-right"></i></a></p>
            </div>
            <div class="home-img">
                <img src="assets/home-img.jpg" alt="gambar pemandangan">
                <div class="img-overlay"></div>
            </div>
        </div>
    </section>

    <section id="collection">
        <div class="judul">
            <p>COLLECTION</p>
        </div>
        <div class="collection-container">
            <div class="collection-item">
                <img src="assets/kamera-1.jpg   " alt="gambar kamera" class="item-gambar">
                <p class="item-judul">SONY A7S III</p>
                <p class="item-desc">Temukan kualitas gambar yang luar biasa! Dengan sensor canggih, kemampuan autofocus presisi tinggi, dan performa luar biasa</p>
            </div>
            <div class="collection-item">
                <img src="assets/kamera-2.jpg   " alt="gambar kamera" class="item-gambar">
                <p class="item-judul">SONY A6700</p>
                <p class="item-desc">Temukan kualitas gambar yang luar biasa! Dengan sensor canggih, kemampuan autofocus presisi tinggi, dan performa luar biasa</p>
            </div>
            <div class="collection-item">
                <img src="assets/kamera-3.jpg   " alt="gambar kamera" class="item-gambar">
                <p class="item-judul">Canon EOS 60D</p>
                <p class="item-desc">Temukan kualitas gambar yang luar biasa! Dengan sensor canggih, kemampuan autofocus presisi tinggi, dan performa luar biasa</p>
            </div>
        </div>
        <div class="collection-button">
            <a href="">
                <button>
                    SHOW MORE
                </button>
            </a>
        </div>
    </section>

    <section id="about">
        <div class="about-judul">
            <p>ABOUT ME</p>
        </div>
        <div class="about-container">
            <p class="about-head">
                Hallo,
            </p>
            <p class="about-desc">
                Perkenalkan nama saya Vandy Rizky Septiawan, Saya berkuliah di Universitas Mulawarman prodi Informatika
            </p>
        </div>
    </section>

    <footer id="footer">
        <div class="footer-content">
            <p>Copyright © 2024 SeeCam</p>
        </div>
    </footer>

    <script src="script/script.js"></script>
</body>
</html>