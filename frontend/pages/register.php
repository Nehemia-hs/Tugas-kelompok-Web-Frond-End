<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page - Modern UI</title>
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
        <form action="../../backend/register_process.php" method="POST">
            <h2>Register</h2>
            
            <div class="input-box">
                <input type="text" name="fullname" placeholder="Full Name" required />
                <i class="ri-user-line"></i>
            </div>

            <div class="input-box">
                <input type="email" name="email" placeholder="Email Address" required />
                <i class="ri-mail-line"></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" id="reg-password" placeholder="Create Password" required />
                <i class="ri-lock-line"></i>
            </div>

            <div class="input-box">
                <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" required />
                <i class="ri-shield-check-line"></i>
            </div>

            <button type="submit" class="btnn">Create Account</button>

            <div class="button" style="margin-top: -10px;">
                <p style="font-size: 14px;">Already have an account? <a href="login.php" style="font-weight: 700; color: #fff; text-decoration: underline;">Login</a></p>
            </div>
        </form>
    </div>

</body>
</html>