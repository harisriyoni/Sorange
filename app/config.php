<?php
// Informasi koneksi database
$server = "nuskkyrsgmn5rw8c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$user = "by3mr2ynlvfchemi";
$password = "y80rqx6zcwqyogjk";
$namadb = "hq73ag1vyooqgnoo";

// Menghubungkan ke database
$db = mysqli_connect($server, $user, $password, $namadb);

// Memeriksa apakah koneksi berhasil
if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

echo "Koneksi berhasil!";
?>
