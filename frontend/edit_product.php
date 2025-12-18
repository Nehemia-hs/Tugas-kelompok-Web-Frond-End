<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - NgopiLagi</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
session_start();
// if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
//     header("Location: index.php");
//     exit();
// }
include '../../backend/config.php';
$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if (!$result || $result->num_rows == 0) {
    echo "Produk tidak ditemukan.";
    exit();
}
$product = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-logo">Ngopi<span>Lagi</span>.</a>
        <div class="navbar-nav">
            <a href="index.php">Home</a>
            <a href="admin.php">Admin</a>
        </div>
    </nav>

    <div class="container">
        <h1>Edit Produk: <?php echo $product['name']; ?></h1>
        <?php if (!empty($product['image'])): ?>
            <p>Gambar Saat Ini: <img src="<?php echo $product['image']; ?>" width="100" alt="Current Image"></p>
        <?php endif; ?>
        <form action="../../backend/update_product.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <label for="name">Nama Produk:</label>
            <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required><br>
            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description"><?php echo $product['description']; ?></textarea><br>
            <label for="price">Harga:</label>
            <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" step="0.01" required><br>
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="<?php echo $product['stock']; ?>" required><br>
            <label for="image">Gambar Baru (opsional):</label>
            <input type="file" id="image" name="image" accept="image/*"><br>
            <button type="submit">Update Produk</button>
        </form>
    </div>
</body>
</html>