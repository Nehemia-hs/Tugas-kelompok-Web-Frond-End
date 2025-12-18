<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // In a real application, send reset email here
        echo "Password reset link has been sent to your email.";
    } else {
        echo "No account found with that email.";
    }

    $stmt->close();
}

$conn->close();
?>