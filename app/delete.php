<?php
session_start();
include ("config.php");
if(!isset($_SESSION['admin_username'])){
    header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sorange.id</title>
</head>
<body>
<nav>
        <div class="logo">
            <h4>SORANGE.ID</h4>
        </div>
        <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Berita
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="index.php">Home</a></li>
    <li><a class="dropdown-item" href="artikel-edukasi.php">Baca Berita</a></li>
  </ul>
</div>
          <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Data Berita/Logout
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="form-create.php">Upload Berita</a></li>
    <li><a class="dropdown-item" href="list-kategori.php">Data Kategori Berita</a></li>
    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
  </ul>
</div>
      </nav>
      <script src="ss.js"></script>
      
</body>
</html>
<br>
<?php
 require "config.php";

 $id = $_GET['id'];
 //delete from merupakan suatu perintah yang akan menghapus salah satu data yang dipilih didalam  sql kategori_berita
 $sql = "DELETE FROM kategori_berita WHERE id='$id'";
 $query = mysqli_query($db, $sql);

 if ($query){
 	header("location:list-kategori.php?status=sukses");
 } else {
 	header ("location:list-kategori.php?status=sukses");
 }

?>