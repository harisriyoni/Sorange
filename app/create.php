<?php
// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Fungsi untuk logging
function logError($message) {
    error_log(date('[Y-m-d H:i:s] ') . $message . "\n", 3, __DIR__ . '/error.log');
}

//untuk menghubungkan file ini dengan config
require("config.php");

// Inisialisasi variabel untuk pesan
$message = "";

// cek apakah ada tombol submit sudah di klik atau belum?
if (isset($_POST['submit'])) {
    // ambil data dari formulir
    $kategori = $_POST['kategori'];
    $judulberita = $_POST['judul_berita'];
    $isiberita = $_POST['isi_berita'];

    // Proses upload gambar
    $target_dir = __DIR__ . "/app/";
    $file_name = basename($_FILES["gambar"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file gambar adalah gambar aktual atau gambar palsu
    if(isset($_FILES["gambar"]["tmp_name"]) && !empty($_FILES["gambar"]["tmp_name"])) {
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if($check === false) {
            $message = "File is not an image.";
            $uploadOk = 0;
        }
    } else {
        $message = "No file was uploaded.";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["gambar"]["size"] > 5000000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Izinkan format file tertentu
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Jika semuanya ok, coba untuk upload file
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
                $message = "Berita berhasil dipublish dan gambar terupload.";
                logError("Data saved to database. File path: " . $target_file);
            } else {
                $message = "Gagal menyimpan data ke database.";
                logError("Failed to save data to database. Error: " . $db->error);
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
            logError("Failed to move uploaded file. Upload error code: " . $_FILES["gambar"]["error"]);
        }
    }

    // Log upload status
    logError("Upload status: " . $message);
}
?>