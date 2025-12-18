<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['cart'])) {
    header("Location: ../frontend/pages/login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Insert order
$stmt = $conn->prepare("INSERT INTO orders (user_id, total) VALUES (?, ?)");
$stmt->bind_param("id", $user_id, $total);
$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// Insert order items
foreach ($_SESSION['cart'] as $product_id => $item) {
    $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiid", $order_id, $product_id, $item['quantity'], $item['price']);
    $stmt->execute();
    $stmt->close();
}

// Clear cart
unset($_SESSION['cart']);

$conn->close();

header("Location: ../frontend/pages/order_success.php");
exit();
?>