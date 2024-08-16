<?php
$url = parse_url(getenv("JAWSDB_URL"));

$host = $url["nuskkyrsgmn5rw8c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com"];
$username = $url["by3mr2ynlvfchemi"];
$password = $url["y80rqx6zcwqyogjk"];
$namadb = substr($url["hq73ag1vyooqgnoo"], 1);

$db = new mysqli($host, $username, $password, $namadb);

if (!$db) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

echo "Koneksi berhasil!";
?>
