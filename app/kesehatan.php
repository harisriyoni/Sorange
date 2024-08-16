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

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="sains.php">Sains</a></li>
            <li><a href="kesehatan.php">Kesehatan</a></li>
            <li><a href="artikel-edukasi.php">Teknologi</a></li>
           
            
        </ul>

        <div class="menu-toggle">
            <input type="checkbox">
          <span></span>
          <span></span>
          <span></span>
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
      
    </div>
  </div>
  
  
        
    <div class="container" style="margin-top:40px">
    <?php $query = mysqli_query($db, "SELECT*FROM kategori_berita")?>
      <?php foreach ($query as $row) :?>
        <div class="row">
            <div class="col-md-9">
                  <div class="panel panel-default">
                   <div class="panel-body">
                    <div class="post-detail">
                      <h3><?php echo $row['judul_berita'];?></h3>
                      
                        <div class="info-meta">
                            <ul class="list-inline">
                                <li><i class="fa fa-user"></i> SORANGE.ID</li>
                                <li class="pull-right">Kategori : <?php echo $row['kategori'];?></li>
                            </ul>
                        </div>
                      <hr>
                      <p>
                      <img src="<?php echo $row['gambar'];?>" height="300" width="500" alt="..." style="float:left;padding:5px 10px 5px 10px;"><p><?php echo $row['isi_berita'];?></p>
                    
                      </div>
                     
                    <div class="frame-tombol" >
                        <a href="" class="btn tombol-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                        <a href="" title="Share on Facebook" target="_blank" class="btn tombol-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                        <a href="" title="Share on Google+" target="_blank" class="btn tombol-googleplus"><i class="fa fa-google-plus"></i> Google+</a>
                        <a href="" class="btn tombol-pinterest"><i class="fa fa-pinterest"></i> Pinterest</a>
                        <a href="" class="btn tombol-linkedin"><i class="fa fa-linkedin"></i> LinkedIn</a>
                    </div>                
                   </div><hr>
                   
                </div>
             </div>
             
               <!-- sidebar -->
               <div class="col-md-3">
                <div class="panel panel-default">
                   <div class="panel-heading"><h4 class="text-center">Terbaru</h4></div><hr>
                   <div class="panel-body">
                        <div class="recent">
                            <a href="#"><img class="img-responsive" src="<?php echo $row['gambar'];?>" alt="" height="300" width="400"/></a> 
                            <h4>
                                <a href="sains.php"><?php echo $row['judul_berita'];?></a>
                            </h4>
                        </div>
                        
                        <div class="recent">
                            <a href="#"><img class="img-responsive" src="<?php echo $row['gambar'];?>" alt="" height="300" width="400"/></a>                           
                            <h4 class="entry-title">
                                <a href="artikel-edukasi.php"><?php echo $row['judul_berita'];?></a>
                            </h4>
                        </div>
                    </div>
                </div>      
            </div>          
        </div>          
    </div>
  </div>
</div><hr>
<?php endforeach;?>
<!-- cardfinish -->
<!-- gbut -->
<div class="spinner-grow text-primary" role="status" >
  <span class="visually-hidden">Loading...</span>
</div>
<div class="spinner-grow text-secondary" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
<div class="spinner-grow text-success" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
<div class="spinner-grow text-danger" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
<div class="spinner-grow text-warning" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
<div class="spinner-grow text-info" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
<div class="spinner-grow text-light" role="status">
  <span class="visually-hidden">Loading...</span>
</div>

<!-- finish gabut -->
      <!--FOOTER-->
      <div class="footer-bottom">
        <div class="container-fluid text-center">
            <p class="text-white"> Developed by.<a class="text-white" href="index.php">Sorange.ID</a></p>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>