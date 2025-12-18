<?php
include 'config.php';

$username = 'admin';
$email = 'admin@kopikita.com';
$password = 'admin';
$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE password = VALUES(password)");
$stmt->bind_param("sss", $username, $email, $hash);
$stmt->execute();
echo "Admin inserted/updated.";

$stmt->close();
$conn->close();
?>