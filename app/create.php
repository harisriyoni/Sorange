<?php
//untuk menghubungkan file ini dengan config
require("config.php");

// cek apakah ada tombol daftar sudah di klik atau belum?
if (isset($_POST['submit'])) {

    // ambil data dari formulir
    $id = $_POST['id'];
    $kategori = $_POST['kategori'];
    $judulberita = $_POST['judul_berita'];
    $deskripsi = $_POST['deskripsi'];
    $isiberita = $_POST['isi_berita'];

    // Proses upload gambar
    $target_dir = "/app/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["gambar"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // If everything is ok, try to upload file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else {
        echo "Sorry, your file was not uploaded.";
        exit();
    }

    // buat query
    $sql = "INSERT INTO kategori_berita (id, kategori, judul_berita, deskripsi, isi_berita, gambar) VALUE ('$id', '$kategori', '$judulberita', '$deskripsi', '$isiberita', '$gambar')";
    $query = mysqli_query($db, $sql);

    // Apakah query simpan berhasil?
    if ($query) {
        // Kalau berhasil alihkan ke halaman index.php dengan status = sukses
        header('Location:dashboard.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman index.php dengan status = gagal
        header('Location:dashboard.php?status=gagal');
    }
}
?>