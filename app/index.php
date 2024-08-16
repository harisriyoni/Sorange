<?php
session_start();
include ("config.php");
if(!isset($_SESSION['admin_username'])){
    header("location:login.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

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
      <script src="js/ss.js"></script>
      
   
 <div class="jumbotron">
   <div class="container"><br>
      <h1 class="display-4 text-white"><b> SORANGE </b><br> <span class="font-weight-bold text-white"><b> SELAMAT DATANG SORANGE</b></span></h1>
     
    <p class="lead text-white"><b>Selamat Membaca</b> </p>
    <p class="lead text-white"><b>Upload Berita Kamu Di Bawah Sini!</b> </p>
    <a class="btn btn-primary btn-lg font-weight-bold" href="form-create.php" role="button"><img src="upload2.gif" height="60" alt=""></a>
   </div>
 </div> 
 <br><br><br><br><br>
<!-- card baru -->
	<div class="container-fluid">
    <?php
    $query = mysqli_query($db, "SELECT*FROM kategori_berita")?>
      <div class="row">
        <?php foreach ($query as $row) :?>
            <div class="card" style="width: 27rem;" ALIGN="center">
            <img src="<?php echo $row['gambar'] ;?>" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title"><?php echo $row['judul_berita'];?></h5>
            <small><?php echo $row['deskripsi'];?></p></small><br>
            <small><?php echo $row['kategori'];?></small>
            <p class="card-text">Klik Selengkapnya untuk membaca</p>
             <a href="artikel-edukasi.php" class="btn btn-primary">Selengkapnya</a>
            </div>
      </div><br>
        <?php endforeach ?>                
     </div>
  </div>
</div> 
       <br><br><br>   
    <!--FOOTER-->
    <div class="footer-bottom">
        <div class="container-fluid text-center">
            <p class="text-white"> Developed by.<a class="text-white" href="index.php">Sorange.ID</a></p>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>