<?php
session_start();

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Hapus cookie PHPSESSID
if (isset($_COOKIE['PHPSESSID'])) {
    setcookie('PHPSESSID', '', time() - 3600, '/'); // Atur waktu kedaluwarsa di masa lalu untuk menghapus cookie
}

// Arahkan kembali ke halaman login
header("Location: login.php");
exit();
?>
