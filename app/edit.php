<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login_.css">

    <title>Document</title>
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
      <br><br>
    <?php
    include 'config.php';
    $id = $_GET['id'];
    $data = mysqli_query($db, "select * from kategori_berita where id='$id'");
    while ($d = mysqli_fetch_array($data)) { //menangkap data dari query merubahnya menjadi bentuk array
    ?>
    <form action="update.php" method="POST" ALIGN="center">
    <ul>
            <td><input type="hidden" name="id" value="<?php echo $d['id']; ?>" ></td>
            <td>
            <label for="kategori">Kategori :</label>
                <input type="text" name="kategori" id="kategori" value="<?php echo $d['kategori']; ?>" required>
            </td>
            <br>
            <br>
               <td>
               <label for="judul_berita">Judul Berita :</label>
                <input type="text" name="judul_berita" id="judul_berita" value="<?php echo $d['judul_berita']; ?>" required>
               </td>
               <br>
               <br>
            <td>
                 <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" id="deksripsi" value="<?php echo $d['deskripsi']; ?>" required>
            </td>   
            <br>
            <br>
            <td>
                 <label for="isi_berita">Isi Berita :</label>
                <textarea type="textarea" name="isi_berita" id="isi_berita" rows="8" value="<?php echo $d['judul_berita']; ?>"></textarea>
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
    <?php
    }?>
</body>
</html>