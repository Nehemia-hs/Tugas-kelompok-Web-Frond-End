<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Produk - NgopiLagi</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
session_start();
// if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
//     header("Location: index.php");
//     exit();
// }
?>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-logo">Ngopi<span>Lagi</span>.</a>
        <div class="navbar-nav">
            <a href="index.php">Home</a>
            <a href="pages/products.php">Produk</a>
        </div>
    </nav>

    <div class="container">
        <h1>Manage Produk</h1>

        <h2>Tambah Produk Baru</h2>
        <form action="../backend/add_product.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Nama Produk" required>
            <textarea name="description" placeholder="Deskripsi"></textarea>
            <input type="number" name="price" placeholder="Harga" step="0.01" required>
            <input type="number" name="stock" placeholder="Stock" required>
            <input type="file" name="image" accept="image/*">
            <button type="submit">Tambah Produk</button>
        </form>

        <h2>Daftar Produk</h2>
        <table>
            <tr><th>ID</th><th>Nama</th><th>Deskripsi</th><th>Harga</th><th>Stock</th><th>Gambar</th><th>Aksi</th></tr>
            <?php
            include '../backend/config.php';
            $result = $conn->query("SELECT * FROM products");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>Rp " . number_format($row['price'], 0, ',', '.') . "</td>";
                echo "<td>" . $row['stock'] . "</td>";
                echo "<td><img src='" . $row['image'] . "' width='50'></td>";
                echo "<td><a href='edit_product.php?id=" . $row['id'] . "'>Edit</a> | <a href='../../backend/delete_product.php?id=" . $row['id'] . "'>Hapus</a></td>";
                echo "</tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>