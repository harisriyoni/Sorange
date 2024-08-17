<?php
session_start();

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Hapus cookie PHPSESSID
if (isset($_COOKIE['PHPSESSID'])) {
    unset($_COOKIE['PHPSESSID']); // Hapus dari array $_COOKIE
    setcookie('PHPSESSID', '', 0, '/'); // Hapus dari browser
}

// Arahkan kembali ke halaman login
header("Location: login.php");
exit();
?>
