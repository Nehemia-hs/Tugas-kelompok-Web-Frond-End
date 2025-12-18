<?php
include 'config.php';

$stmt = $conn->prepare("SELECT password FROM users WHERE username = 'admin'");
$stmt->execute();
$stmt->bind_result($hash);
$stmt->fetch();
echo "Hash: " . $hash . "<br>";
echo "Verify 'admin': " . (password_verify('admin', $hash) ? 'Yes' : 'No') . "<br>";

$stmt->close();
$conn->close();
?>