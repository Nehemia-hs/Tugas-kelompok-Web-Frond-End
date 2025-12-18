<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - NgopiLagi</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-logo">Ngopi<span>Lagi</span>.</a>
        <div class="navbar-nav">
            <a href="../index.php">Home</a>
            <a href="products.php">Produk</a>
            <a href="login.php">Login</a>
        </div>
    </nav>

    <div class="container">
        <h1>Keranjang Belanja</h1>
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            echo "<table>";
            echo "<tr><th>Produk</th><th>Harga</th><th>Jumlah</th><th>Total</th><th>Aksi</th></tr>";
            $total = 0;
            foreach ($_SESSION['cart'] as $id => $item) {
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
                echo "<tr>";
                echo "<td>" . $item['name'] . "</td>";
                echo "<td>Rp " . number_format($item['price'], 0, ',', '.') . "</td>";
                echo "<td>" . $item['quantity'] . "</td>";
                echo "<td>Rp " . number_format($subtotal, 0, ',', '.') . "</td>";
                echo "<td><a href='../../backend/update_cart.php?remove=" . $id . "' class='btn-remove'>Hapus</a></td>";
                echo "</tr>";
            }
            echo "<tr><td colspan='4'>Total</td><td>Rp " . number_format($total, 0, ',', '.') . "</td></tr>";
            echo "</table>";
            
            // Tambah produk baru
            include '../../backend/config.php';
            $result = $conn->query("SELECT id, name FROM products");
            if ($result && $result->num_rows > 0) {
                echo "<h2>Tambah Produk Baru</h2>";
                echo "<form action='../../backend/add_to_cart.php' method='POST'>";
                echo "<select name='product_id' required>";
                echo "<option value=''>Pilih Produk</option>";
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
                echo "</select>";
                echo "<input type='number' name='quantity' value='1' min='1' style='width: 60px;'>";
                echo "<button type='submit'>Tambah ke Keranjang</button>";
                echo "</form>";
            }
            $conn->close();
            
            echo "<a href='checkout.php'>Checkout</a>";
        } else {
            echo "<p>Keranjang kosong.</p>";
        }
        ?>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>