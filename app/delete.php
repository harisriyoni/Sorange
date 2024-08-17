<?php
require "config.php";

$id = $_GET['id'];

// Pertama, ambil informasi gambar dari database
$sql = "SELECT gambar FROM kategori_berita WHERE id='$id'";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($query);

if ($data) {
    $gambar_path = __DIR__ . $data['gambar']; // Mendapatkan path lengkap dari gambar

    // Cek apakah file gambar ada, lalu hapus
    if (file_exists($gambar_path)) {
        unlink($gambar_path); // Menghapus file gambar
    }

    // Setelah gambar dihapus, hapus data dari database
    $sql_delete = "DELETE FROM kategori_berita WHERE id='$id'";
    $query_delete = mysqli_query($db, $sql_delete);

    if ($query_delete) {
        header("location:dashboard.php?status=sukses");
    } else {
        header("location:dashboard.php?status=gagal");
    }
} else {
    header("location:dashboard.php?status=gagal"); // Jika data tidak ditemukan
}

?>
