<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("config.php"); // Pastikan file ini berisi koneksi database Anda

$message = '';

if (isset($_POST['submit'])) {
    // Ambil data dari formulir
    $kategori = $_POST['kategori'];
    $judulberita = $_POST['judul_berita'];
    $isiberita = $_POST['isi_berita'];

    // Proses upload gambar
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
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $message = "File bukan gambar.";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["gambar"]["size"] > 5000000) {
        $message = "Maaf, file terlalu besar.";
        $uploadOk = 0;
    }

    // Izinkan format file tertentu
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $message = "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
        $uploadOk = 0;
    }

    // Jika tidak ada error, coba upload file dan simpan data ke database
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar = "/app/" . $file_name; // Path relatif untuk disimpan di database

            // Simpan data ke database
            $sql = "INSERT INTO kategori_berita (kategori, judul_berita, isi_berita, gambar) VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("ssss", $kategori, $judulberita, $isiberita, $gambar);
            
            if ($stmt->execute()) {
                $message = "Berita berhasil dipublish dan gambar terupload.";
            } else {
                $message = "Gagal menyimpan data ke database: " . $db->error;
            }
        } else {
            $message = "Maaf, terjadi error saat mengupload file.";
        }
    }
}
?>