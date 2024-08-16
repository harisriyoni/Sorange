<?php
require 'config.php';

    $id = $_POST['id'];
    $kategori = $_POST['kategori'];
    $judulberita = $_POST['judul_berita'];
    $deskripsi = $_POST['deskripsi'];
    $isiberita = $_POST['isi_berita'];
    $gambar = $_POST['gambar'];

mysqli_query($db, "update kategori_berita set kategori='$kategori', judul_berita='$judulberita', deskripsi = '$deskripsi', isi_berita = '$isiberita', gambar = '$gambar' where id=$id");

header("location:list-kategori.php");