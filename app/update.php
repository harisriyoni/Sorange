<?php
require 'config.php';

$id = $_POST['id'];
$kategori = $_POST['kategori'];
$judulberita = $_POST['judul_berita'];
$isiberita = $_POST['isi_berita'];

// Proses upload gambar jika ada
if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != '') {
    // Proses upload gambar baru
    $target_dir = __DIR__ . "/"; // Simpan di direktori root proyek

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
            $gambar = $file_name; // Hanya menyimpan nama file gambar di database

            // Update data termasuk gambar baru di database
            mysqli_query($db, "UPDATE kategori_berita SET kategori='$kategori', judul_berita='$judulberita', isi_berita='$isiberita', gambar='$gambar' WHERE id='$id'");
        }
    }
} else {
    // Jika tidak ada gambar baru yang diupload, update tanpa gambar
    mysqli_query($db, "UPDATE kategori_berita SET kategori='$kategori', judul_berita='$judulberita', isi_berita='$isiberita' WHERE id='$id'");
}

header("location:dashboard.php");
?>
