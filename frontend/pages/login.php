<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
    <form action="../../backend/login_process.php" method="POST">
        <h2>Login</h2>

        <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
            <i class="ri-user-fill"></i>
        </div>

        <div class="input-box">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <i class="ri-eye-off-fill toggle-password" id="togglePassword"></i>
        </div>

        <div class="remember">
            <label><input type="checkbox"> Remember me</label>
            <a href="forget.php">Forget Password?</a>
        </div>

        <button type="submit" class="btnn">Login</button>

        <div class="button">
            <a href="#"><i class="ri-google-fill"></i> Google</a>
            <span>--</span>
            <a href="#"><i class="ri-facebook-fill"></i> Facebook</a>
        </div>

        <p class="switch">
            Belum punya akun?
            <a href="register.php">Register</a>
        </p>
    </form>
</div>

<script src="../js/script.js"></script>
</body>
</html>