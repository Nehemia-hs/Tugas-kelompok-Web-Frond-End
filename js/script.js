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
