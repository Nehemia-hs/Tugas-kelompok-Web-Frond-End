<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian - NgopiLagi</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-logo">Ngopi<span>Lagi</span>.</a>
        <div class="navbar-nav">
            <a href="../index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="cart.php">Keranjang</a>
        </div>
    </nav>

        <div class="container">
        <h1>Daftar Menu Kopi</h1>
        <div class="products">
            <?php
            include '../../backend/config.php';
            $result = $conn->query("SELECT * FROM products");
            if (!$result) {
                echo "<p>Error: " . $conn->error . "</p>";
            } elseif ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product'>";
                    echo "<img src='../" . $row['image'] . "' alt='" . $row['name'] . "'>";
                    echo "<h3>" . $row['name'] . "</h3>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<p>Rp " . number_format($row['price'], 0, ',', '.') . "</p>";
                    echo "<form action='../../backend/add_to_cart.php' method='POST'>";
                    echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
                    echo "<input type='number' name='quantity' value='1' min='1'>";
                    echo "<button type='submit'>Tambah ke Keranjang</button>";
                    echo "</form>";
                    echo "</div>";
                }
            } else {
                echo "<p>Tidak ada produk tersedia.</p>";
            }
            $conn->close();
            ?>
        </div>
    <script src="../js/script.js"></script>