<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/loginstyle.css">
</head>
<body>

<!-- ===================== NAVBAR ===================== -->
    <!-- Bagian navigasi yang berisi logo dan menu utama -->
    <nav class="navbar">
        <!-- Logo di navbar -->
        <a href="#" class="navbar-logo">Ngopi<span>Lagi</span>.</a>

        <!-- Ikon tambahan: search, cart, dan hamburger menu -->
        <div class="navbar-kembali">
            <a href="/frontend/index.php" class="btn-kembali">Kembali</a>
        </div>
    </nav>
<!-- ===================== END NAVBAR ===================== -->

<div class="content">
    <form action="../../backend/forget_process.php" method="POST">
        <h2>Forgot Password</h2>

        <div class="input-box">
            <input type="email" name="email" placeholder="Masukkan Email" required>
            <i class="ri-mail-fill"></i>
        </div>

        <button type="submit" class="btnn">Reset Password</button>

        <p class="switch">
            <a href="login.php">← Kembali ke Login</a>
        </p>
    </form>
</div>

</body>
</html>