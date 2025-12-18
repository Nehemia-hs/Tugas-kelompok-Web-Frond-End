<?php
session_start();
include 'config.php';

if (isset($_GET['remove'])) {
    $product_id = $_GET['remove'];
    unset($_SESSION['cart'][$product_id]);
    header("Location: ../frontend/pages/cart.php");
    exit();
}

$conn->close();
?>