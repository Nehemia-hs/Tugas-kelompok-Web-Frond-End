<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - NgopiLagi</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-logo">Ngopi<span>Lagi</span>.</a>
        <div class="navbar-nav">
            <a href="../index.php">Home</a>
            <a href="products.php">Produk</a>
            <a href="cart.php">Keranjang</a>
        </div>
    </nav>

    <div class="container">
        <h1>Checkout</h1>
        <?php
        session_start();
        if (!isset($_SESSION['user_id'])) {
            echo "<p>Silakan login terlebih dahulu. <a href='../frontend/pages/login.php'>Login</a></p>";
            exit();
        }

        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            echo "<table>";
            echo "<tr><th>Produk</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr>";
            $total = 0;
            foreach ($_SESSION['cart'] as $item) {
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
                echo "<tr>";
                echo "<td>" . $item['name'] . "</td>";
                echo "<td>Rp " . number_format($item['price'], 0, ',', '.') . "</td>";
                echo "<td>" . $item['quantity'] . "</td>";
                echo "<td>Rp " . number_format($subtotal, 0, ',', '.') . "</td>";
                echo "</tr>";
            }
            echo "<tr><td colspan='3'><strong>Total</strong></td><td><strong>Rp " . number_format($total, 0, ',', '.') . "</strong></td></tr>";
            echo "</table>";
            echo "<form action='../../backend/process_order.php' method='POST'>";
            echo "<button type='submit'>Konfirmasi Pembelian</button>";
            echo "</form>";
            echo "<a href='cart.php' style='background-color: #f44336; margin-left: 1rem;'>Batal</a>";
        } else {
            echo "<p>Keranjang kosong.</p>";
        }
        ?>
    </div>
</body>
</html>