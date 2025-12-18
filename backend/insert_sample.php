<?php
include 'config.php';

$products = [
    ['name' => 'Espresso', 'description' => 'Kopi hitam klasik', 'price' => 18000, 'stock' => 50, 'image' => 'Image/menu/2.avif'],
    ['name' => 'Latte', 'description' => 'Kopi dengan susu', 'price' => 22000, 'stock' => 30, 'image' => 'Image/menu/2.avif'],
    ['name' => 'Cappuccino', 'description' => 'Kopi dengan foam susu', 'price' => 23000, 'stock' => 40, 'image' => 'Image/menu/2.avif'],
    ['name' => 'Americano', 'description' => 'Kopi panas dengan air', 'price' => 15000, 'stock' => 60, 'image' => 'Image/menu/2.avif']
];

foreach ($products as $product) {
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, stock, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdis", $product['name'], $product['description'], $product['price'], $product['stock'], $product['image']);
    $stmt->execute();
    $stmt->close();
}

echo "Sample products inserted.";
$conn->close();
?>