<?php
include 'config.php';

$result = $conn->query("SELECT username, email FROM users");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Username: " . $row['username'] . ", Email: " . $row['email'] . "<br>";
    }
} else {
    echo "No users found.";
}

$conn->close();
?>