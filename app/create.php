<?php
//untuk menghubungkan file ini dengan config
require("config.php");

// Inisialisasi variabel untuk pesan error
$error_message = "";

// cek apakah ada tombol daftar sudah di klik atau belum?
if (isset($_POST['submit'])) {

    // ambil data dari formulir
    $kategori = $_POST['kategori'];
    $judulberita = $_POST['judul_berita'];
    $isiberita = $_POST['isi_berita'];

    // Proses upload gambar
    $target_dir = __DIR__ . "/app/"; // Menggunakan path absolut
    $file_name = basename($_FILES["gambar"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check === false) {
        $error_message = "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["gambar"]["size"] > 5000000) {
        $error_message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        $error_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // If everything is ok, try to upload file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar = "/app/" . $file_name; // Path relatif untuk disimpan di database

            // buat query
            $sql = "INSERT INTO kategori_berita (kategori, judul_berita, isi_berita, gambar) VALUES (?, ?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->bind_param("ssss", $kategori, $judulberita, $isiberita, $gambar);
            $query = $stmt->execute();

            // Apakah query simpan berhasil?
            if ($query) {
                // Kalau berhasil alihkan ke halaman dashboard.php dengan status = sukses
                header('Location: dashboard.php?status=sukses');
                exit();
            } else {
                $error_message = "Gagal menyimpan data ke database.";
            }
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
        }
    }
}
