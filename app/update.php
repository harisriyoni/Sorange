<?php
require 'config.php';

$id = $_POST['id'];
$kategori = $_POST['kategori'];
$judulberita = $_POST['judul_berita'];
$deskripsi = $_POST['deskripsi'];
$isiberita = $_POST['isi_berita'];

// Proses upload gambar jika ada
if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != '') {
    // Pertama, ambil informasi gambar lama dari database
    $sql = "SELECT gambar FROM kategori_berita WHERE id='$id'";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $old_gambar_path = __DIR__ . $data['gambar']; // Mendapatkan path lengkap dari gambar lama

        // Cek apakah file gambar lama ada, lalu hapus
        if (file_exists($old_gambar_path)) {
            unlink($old_gambar_path); // Menghapus file gambar lama
        }
    }

    // Proses upload gambar baru
    $target_dir = __DIR__ . "/app/";
    
    // Pastikan direktori ada
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = basename($_FILES["gambar"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file gambar adalah gambar aktual
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["gambar"]["size"] > 5000000) {
        $uploadOk = 0;
    }

    // Izinkan format file tertentu
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
    }

    // Jika tidak ada error, upload file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar = "/app/" . $file_name; // Path relatif untuk disimpan di database
        } else {
            // Jika gagal upload, Anda bisa mengatur tindakan fallback
            $gambar = $data['gambar']; // Gunakan gambar lama jika gagal upload
        }
    }
} else {
    // Jika tidak ada gambar baru yang diupload, tetap gunakan gambar lama
    $sql = "SELECT gambar FROM kategori_berita WHERE id='$id'";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);
    $gambar = $data['gambar'];
}

// Update data di database
mysqli_query($db, "UPDATE kategori_berita SET kategori='$kategori', judul_berita='$judulberita', deskripsi='$deskripsi', isi_berita='$isiberita', gambar='$gambar' WHERE id='$id'");

header("location:dashboard.php");
?>
