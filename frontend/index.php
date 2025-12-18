<!DOCTYPE html>
<html lang="en">
<!-- =================== BAGIAN HEAD =================== -->

<head>
    <!-- Mengatur karakter dan tampilan responsif -->
    <!-- Mengatur karakter, tampilan responsif, dan judul halaman -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Judul website -->
    <title>Ngopi Lagi</title>

    <!-- Menghubungkan font Poppins dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet" />

    <!-- Memuat Feather Icons (ikon berbasis JS) -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Menghubungkan file CSS utama -->
    <link rel="stylesheet" href="css/style.css" />
</head>

<?php session_start(); ?>

<body>
    <!-- ===================== NAVBAR ===================== -->
    <!-- Bagian navigasi yang berisi logo dan menu utama -->
    <nav class="navbar">
        <!-- Logo di navbar -->
        <a href="#" class="navbar-logo">Ngopi<span>Lagi</span>.</a>

        <!-- Menu navigasi -->
        <div class="navbar-nav">
            <a href="index.php">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#Menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>

        <!-- Ikon tambahan: search, cart, dan hamburger menu -->
        <div class="navbar-extra">
            <?php
            if (isset($_SESSION['username'])) {
                echo '<span style="color: #fff; margin-right: 1rem;">Halo, ' . $_SESSION['username'] . '</span>';
                if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
                    echo '<a href="admin.php" style="margin-right: 1rem;">Admin Panel</a>';
                }
                echo '<a href="../backend/logout.php">Logout</a>';
                echo '<a href="admin.php" id="admin">Produk</a>';
            } else {
                echo '<a href="pages/login.php" class="btn-login">Login</a>';
            }
            ?>
            <a href="#" id="search"><i data-feather="search"></i></a>
            <a href="pages/cart.php" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- ===================== END NAVBAR ===================== -->

    <!-- ===================== HERO SECTION ===================== -->
    <!-- Bagian halaman pertama berisi judul besar dan tombol ajakan -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Mari Nikmati Secangkir <span>Kopi</span></h1>
            <p>Kopi mengajarkan kesabaran dan menikmati proses.</p>
            <a href="pages/products.php" class="cta">Beli Sekarang</a>
        </main>
    </section>
    <!-- ===================== END HERO SECTION ===================== -->

    <!-- ===================== ABOUT SECTION ===================== -->
    <!-- Bagian yang menjelaskan tentang kedai kopi -->
    <section id="about" class="about">
        <h2><span>Tentang</span> Kami</h2>

        <div class="row">
            <!-- Gambar tentang kami -->
            <div class="about-img">
                <img src="image/tentang kami.jpg" alt="Tentang Kami" />
            </div>

            <!-- Penjelasan tentang kopi -->
            <div class="content">
                <h3>Kenapa Memilih kopi kami?</h3>
                <p>Kualitas kopi terbaik dengan cita rasa khas.</p>
                <p>Dibuat dengan penuh perhatian dan proses yang terjaga.</p>
            </div>
        </div>
    </section>
    <!-- ===================== END ABOUT SECTION ===================== -->

    <!-- ===================== MENU SECTION ===================== -->
    <!-- Bagian daftar menu kopi yang tersedia -->
    <section id="Menu" class="menu">
        <h2><span>Menu</span> Kami</h2>
        <p>Beberapa pilihan kopi terbaik kami.</p>

        <div class="products">
            <div class="product">
                <img src="Image/menu/1.jpg" alt="Espresso" />
                <h3>Espresso</h3>
                <p>Rp 18.000</p>
                <form action="pages/products.php" method="GET">
                    <input type="hidden" name="q" value="espresso">
                    <button type="submit" class="cta" style="margin-top:0.5rem;padding:0.6rem 1rem;">Lihat Produk</button>
                </form>
            </div>

            <div class="product">
                <img src="Image/menu/1.jpg" alt="Lungo" />
                <h3>Lungo</h3>
                <p>Rp 20.000</p>
                <form action="pages/products.php" method="GET">
                    <input type="hidden" name="q" value="lungo">
                    <button type="submit" class="cta" style="margin-top:0.5rem;padding:0.6rem 1rem;">Lihat Produk</button>
                </form>
            </div>

            <div class="product">
                <img src="Image/menu/1.jpg" alt="Machiatto" />
                <h3>Machiatto</h3>
                <p>Rp 23.000</p>
                <form action="pages/products.php" method="GET">
                    <input type="hidden" name="q" value="machiatto">
                    <button type="submit" class="cta" style="margin-top:0.5rem;padding:0.6rem 1rem;">Lihat Produk</button>
                </form>
            </div>

            <div class="product">
                <img src="Image/menu/1.jpg" alt="Latte" />
                <h3>Latte</h3>
                <p>Rp 22.000</p>
                <form action="pages/products.php" method="GET">
                    <input type="hidden" name="q" value="latte">
                    <button type="submit" class="cta" style="margin-top:0.5rem;padding:0.6rem 1rem;">Lihat Produk</button>
                </form>
            </div>

        </div>
    </section>
    <!-- ===================== END MENU SECTION ===================== -->

    <!-- ===================== CONTACT SECTION ===================== -->
    <!-- Bagian untuk menampilkan lokasi dan form kontak -->
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>Hubungi kami untuk pemesanan atau informasi lebih lanjut.</p>

        <div class="row">
            <!-- Peta lokasi toko kopi -->
            <iframe class="map" src="https://www.google.com/maps/embed?...">
            </iframe>

            <!-- Form input nama, email, dan nomor HP -->
            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="nama" />
                </div>

                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="email" />
                </div>

                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="no hp" />
                </div>

                <!-- Tombol kirim pesan -->
                <button type="submit" class="btn">kirim pesan</button>
            </form>
        </div>
    </section>
    <!-- ===================== END CONTACT SECTION ===================== -->

    <!-- ===================== FOOTER ===================== -->
    <!-- Bagian akhir website berisi sosial media, link, dan credit -->
    <footer>
        <div class="socials">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="credit">
            <p>Created by <a href="">Ngopi Lagi</a>. | &copy; 2025</p>
        </div>
    </footer>
    <!-- ===================== END FOOTER ===================== -->

    <!-- Mengaktifkan ikon Feather (mengubah tag <i> menjadi ikon SVG) -->
    <script>
        feather.replace();
    </script>

    <!-- Menghubungkan file JavaScript untuk interaksi navbar -->
    <script src="js/script.js"></script>

    <?php
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
        echo '<div style="padding: 2rem; background-color: rgba(0,0,0,0.8); color: #fff; text-align: center;">';
        echo '<h2>Tambah Produk Baru (Admin)</h2>';
        echo '<form action="../backend/add_product.php" method="POST" enctype="multipart/form-data" style="display: inline-block; text-align: left;">';
        echo '<input type="text" name="name" placeholder="Nama Produk" required style="display: block; margin: 0.5rem 0; padding: 0.5rem; width: 300px;"><br>';
        echo '<textarea name="description" placeholder="Deskripsi" style="display: block; margin: 0.5rem 0; padding: 0.5rem; width: 300px; height: 80px;"></textarea><br>';
        echo '<input type="number" name="price" placeholder="Harga" step="0.01" required style="display: block; margin: 0.5rem 0; padding: 0.5rem; width: 300px;"><br>';
        echo '<input type="number" name="stock" placeholder="Stock" required style="display: block; margin: 0.5rem 0; padding: 0.5rem; width: 300px;"><br>';
        echo '<input type="file" name="image" accept="image/*" style="display: block; margin: 0.5rem 0;"><br>';
        echo '<button type="submit" style="background-color: var(--primary); color: #fff; padding: 0.5rem 1rem; border: none; border-radius: 0.3rem; cursor: pointer;">Tambah Produk</button>';
        echo '</form>';
        echo '</div>';
    }
    ?>
</body>

</html>