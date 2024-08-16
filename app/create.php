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
    $gambar = $_POST['gambar'];

    

    // buat query
    $sql = "INSERT INTO kategori_berita (id, kategori, judul_berita, deskripsi, isi_berita, gambar) VALUE ('$id', '$kategori', '$judulberita', '$deskripsi', '$isiberita', '$gambar')"; //INSERT INTO, UPDATE, SELECT*FROM, DELETE*FROM ini fungsi perintah yang akan dilakukan dalam sql
    $query = mysqli_query($db, $sql); // <- ini yang harus ditambah mysqli_query itu fungsinya untuk menjalankan data
    // Apakah  query simpan berhasil?
    if ($query) {
        // Kalau berhasil alihkan ke halaman index.php dengan status = sukses
        header('Location: ../list-kategori.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman index.php dengan status = gagal
        header('Location: ../list-kategori.php?status=gagal');
    }
}
//Fungsi isset pada PHP adalah Fungsi isset () digunakan untuk memeriksa apakah suatu variabel sudah diatur atau belum.
//Fungsi POST dan GET untuk menampung data atau nilai dari sebuah form atau url sebelum dimanipulasi
?>
