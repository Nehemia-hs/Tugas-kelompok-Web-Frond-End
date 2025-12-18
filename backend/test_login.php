<?php
include 'config.php';

// Simulasi data login (ganti dengan data real)
$test_username = 'admin'; // Ganti dengan username yang sudah register
$test_password = 'admin'; // Ganti dengan password yang sudah register

// Query untuk cek user
$stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
$stmt->bind_param("s", $test_username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if (password_verify($test_password, $hashed_password)) {
        echo "Login berhasil! User ID: $id";
    } else {
        echo "Password salah.";
    }
} else {
    echo "User tidak ditemukan.";
}

$stmt->close();
$conn->close();
?>