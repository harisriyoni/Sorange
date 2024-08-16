<?php include("control/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
  
    <header>
        <h3 ALIGN="center">Daftar Kategori Berita</h3>
    </header>
    <nav>
        <a href="form-create.php">[+] Tambah Data</a>
    </nav>
    <br>
    <table border="2" cellpadding="10" cellspacing="0">
        <thead>
            <th>No</th>
            <th>Kategori</th>
            <th>Judul Berita</th>
            <th>Deskripsi</th>
            <th>Isi Berita</th>
            <th>Gambar</th>
            <th>Opsi</th>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT*FROM kategori_berita";
            $query = mysqli_query($db, $sql);
            while ($d = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td>" . $d['id']. "</td>";
                echo "<td>" . $d['kategori']. "</td>";
                echo "<td>" . $d['judul_berita']. "</td>";
                echo "<td>" . $d['deskripsi']. "</td>";
                echo "<td>" . $d['isi_berita']. "</td>";
                echo "<td>" . $d['gambar']. "</td>";
                

                echo "<td>";
                echo "<a href='edit.php?id=" . $d['id'] . "'>Edit</a> |";
                echo "<a href='control/delete.php?id=" . $d['id'] . "'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
      
        </tbody>
    </table>
    <p> Total : <?php echo mysqli_num_rows($query) ?></p>

    </thebody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      
</html>