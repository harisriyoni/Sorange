<?php
//ini menjaga agar orang selain yang punya akun mengakses website
session_start();
if(isset($_SESSION['admin_username'])){
    header("location:index.php");
}
    include("config.php");
    $username = "";
    $password = "";
    $err = "";
    if (isset($_POST['login'])) {
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        if ($username == '' or $password == '') {
            $err .= "<li>Silakan masukkan username dan password</li>";
        }
        if (empty($err)) {
            $sql1 = "select * from admin where username = '$username'";
            $q1 = mysqli_query($db, $sql1);
            $r1 = mysqli_fetch_array($q1);
            if ($r1['password'] != md5($password)) {
                $err .= "<li>Akun tidak ditemukan</li>";
            }
        }
        if (empty($err)) {
            $_SESSION['admin_username'] = $username;
            header("location:index.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login_.css">
</head>
<body>
    <div id="app" ALIGN="CENTER">
        <h1>SORANGE.ID | BERITA MASA KINI</h1>
        <h1>Halaman Login</h1>
        <?php 
        if($err){
            echo "<ul>$err</ul>";
        }
        ?>
        <form action="" method="POST">
            <input type="text" value="<?php echo $username?>" name="username" class="input" placeholder="username"/><br><br>
            <input type="password" name="password" class="input" placeholder="isikan password"/><br><br>
            <input type="submit" name="login" value="LOGIN"/><br><br>
            <a href="registrasi.php">Buat Akun</a>
           
        </form>
     
        </div>

    </div>
</body>
</html>