// Mengambil elemen menu navbar
const navbarNav = document.querySelector(".navbar-nav");
// ketika hamburger di click
// Menampilkan atau menyembunyikan menu saat tombol hamburger ditekan
document.querySelector("#hamburger-menu").onclick = () => {
    navbarNav.classList.toggle("active");
};

// Klik di luar sidebar untuk menghilangkan nav
// Menyimpan elemen tombol hamburger
const hamburger = document.querySelector("#hamburger-menu");

// Menutup menu navbar ketika pengguna mengklik area di luar hamburger dan navbar
document.addEventListener("click", function (e) {
    if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
    }
});

const loginForm = document.getElementById("loginForm");
const forgotForm = document.getElementById("forgotForm");

function showForgot() {
  loginForm.classList.add("hidden");
  forgotForm.classList.remove("hidden");
}

function showLogin() {
  forgotForm.classList.add("hidden");
  loginForm.classList.remove("hidden");
}

// Toggle password visibility
const togglePassword = document.getElementById("togglePassword");
const passwordInput = document.getElementById("password");

togglePassword.addEventListener("click", () => {
  const type = passwordInput.type === "password" ? "text" : "password";
  passwordInput.type = type;

  togglePassword.classList.toggle("ri-eye-fill");
  togglePassword.classList.toggle("ri-eye-off-fill");
});