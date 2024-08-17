<?php
session_start();
include ("config.php");
if(!isset($_SESSION['admin_username'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login_.css">

    <title>SORANGE.ID</title>
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
      
      <br>
    <br>
    <div class="app" ALIGN="center">
    <header>
         <h1>Upload Berita</h1>
    </header>
    <form action="create.php" method="POST">
        <ul>
            <td>
            <label for="kategori">Kategori :</label>
                <input type="text" name="kategori" id="kategori">
            </td>
            <br>
            <br>
               <td>
               <label for="judul_berita">Judul Berita :</label>
                <input type="text" name="judul_berita" id="judul_berita">
               </td>
               <br>
               <br>
            <td>
                 <label for="deskripsi">Deskripsi</label>
                <input type="textarea" name="deskripsi" id="deksripsi">
            </td>   
            <br>
            <br>
            <td>
                 <label for="isi_berita">Isi Berita :</label>
                <textarea type="textarea" name="isi_berita" id="isi_berita" rows="8"></textarea>
            </td>   
            <br>
            <br>
            <td>
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar"><br><br><br>
            </td>
            <br>
            <br>
            <td>
                <button type="submit" name="submit">Submit</button>
            </td>
        </ul>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     
</body>
</html>