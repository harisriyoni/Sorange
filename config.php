<?php
// Informasi koneksi database
$server = "mysql://semay6vxedd4p6sx:thh3vo09kieb4dtr@nuskkyrsgmn5rw8c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/fizefwddyw5zc87p";
$user = "semay6vxedd4p6sx";
$password = "thh3vo09kieb4dtr";
$namadb = "fizefwddyw5zc87p";

// Menghubungkan ke database
$db = mysqli_connect($server, $user, $password, $namadb);

// Memeriksa apakah koneksi berhasil
if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

echo "Koneksi berhasil!";
?>
