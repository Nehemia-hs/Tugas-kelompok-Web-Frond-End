<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_log("Update product started");
    $id = intval($_POST['id']);
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $stock = intval($_POST['stock']);

    if (empty($name) || $price <= 0 || $stock < 0) {
        error_log("Invalid input: name=$name, price=$price, stock=$stock");
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error - NgopiLagi</title>
            <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
            <link rel="stylesheet" href="../css/style.css">
        </head>
        <body>
            <nav class="navbar">
                <a href="#" class="navbar-logo">Ngopi<span>Lagi</span>.</a>
                <div class="navbar-nav">
                    <a href="../index.php">Home</a>
                    <a href="../frontend/admin.php">Admin</a>
                </div>
            </nav>
            <div class="container">
                <h1>Error</h1>
                <p>Input data tidak valid.</p>
                <a href="../fronte../frontend/admin.php" class="btn">Kembali</a>
            </div>
        </body>
        </html>
        <?php
        exit();
    }

    // Handle image upload if new
    $image_sql = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {
        error_log("Image upload attempt, error: " . $_FILES['image']['error']);
        if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $target_dir = __DIR__ . "/../frontend/Image/menu/";
            $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
            $newFileName = uniqid() . '.' . $imageFileType;
            $target_file = $target_dir . $newFileName;
            error_log("Target file: $target_file");
            if (!is_dir($target_dir)) {
                error_log("Directory does not exist: $target_dir");
                die("Upload directory does not exist.");
            }
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_path = "Image/menu/" . $newFileName;
                $image_sql = ", image = '" . $image_path . "'";
                error_log("Image uploaded successfully: $newFileName");
            } else {
                error_log("Move failed for $target_file");
                die("Failed to move uploaded file to " . $target_file);
            }
        } else {
            die("Upload error: " . $_FILES['image']['error']);
        }
    }

    $query = "UPDATE products SET name = ?, description = ?, price = ?, stock = ?";
    $types = "ssdi";
    $params = [$name, $description, $price, $stock];

    if ($image_sql != '') {
        $query .= ", image = ?";
        $types .= "s";
        $params[] = $image_path;
    }

    $query .= " WHERE id = ?";
    $types .= "i";
    $params[] = $id;

    $stmt = $conn->prepare($query);
    if (!$stmt) {
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error - NgopiLagi</title>
            <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
            <link rel="stylesheet" href="../css/style.css">
        </head>
        <body>
            <nav class="navbar">
                <a href="#" class="navbar-logo">Ngopi<span>Lagi</span>.</a>
                <div class="navbar-nav">
                    <a href="../index.php">Home</a>
                    <a href="../frontend/admin.php">Admin</a>
                </div>
            </nav>
            <div class="container">
                <h1>Error</h1>
                <p>Prepare failed: <?php echo $conn->error; ?></p>
                <a href="../frontend/admin.php" class="btn">Kembali</a>
            </div>
        </body>
        </html>
        <?php
        exit();
    }
    $stmt->bind_param($types, ...$params);
    if (!$stmt->execute()) {
        $stmt->close();
        ?>
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error - NgopiLagi</title>
            <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
            <link rel="stylesheet" href="../css/style.css">
        </head>
        <body>
            <nav class="navbar">
                <a href="#" class="navbar-logo">Ngopi<span>Lagi</span>.</a>
                <div class="navbar-nav">
                    <a href="../index.php">Home</a>
                    <a href="../frontend/admin.php">Admin</a>
                </div>
            </nav>
            <div class="container">
                <h1>Error</h1>
                <p>Execute failed: <?php echo $stmt->error; ?></p>
                <a href="../frontend/admin.php" class="btn">Kembali</a>
            </div>
        </body>
        </html>
        <?php
        exit();
    }
    $stmt->close();

    // header("Location: ../frontend/admin.php");
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Berhasil - NgopiLagi</title>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <nav class="navbar">
            <a href="#" class="navbar-logo">Ngopi<span>Lagi</span>.</a>
            <div class="navbar-nav">
                <a href="../index.php">Home</a>
                <a href="../frontend/admin.php">Admin</a>
            </div>
        </nav>
        <div class="container">
            <h1>Update Produk Berhasil</h1>
            <p>Produk telah berhasil diupdate.</p>
            <?php if ($image_sql != ''): ?>
                <p>Gambar baru telah diupload.</p>
            <?php endif; ?>
            <a href="../frontend/admin.php" class="btn">Kembali ke Admin</a>
        </div>
    </body>
    </html>
    <?php
    exit();
}

$conn->close();
?>