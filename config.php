<?php
//supaya array lebih mudah
$server = "localhost";
$user = "root";
$password = "";
$namadb = "sorange";
//agar config connect dengan sql
$db = mysqli_connect($server, $user, $password, $namadb);
//check apakah config connect dengan sql atau tidak
if(!$db) {
    die("gagal terhubung dengan database : " . mysqli_connect_error());
}
