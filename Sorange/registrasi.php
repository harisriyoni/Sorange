<?php
include 'control/config.php';
include 'control/function.php';

if(isset($_POST['register'])){
    if (Registrasi($_POST) > 0){
        echo "<script> alert('user baru berhasil dibuat')</script>";
    } else {
        echo mysqli_error($db);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="css/login_.css">
    <style>
        label {
            display: block;
        }
    </style>
</head>
<body>
    <div class="app" ALIGN="center">
    <h1>Halaman Registrasi</h1>
        <fieldset>
    <form action="" method="POST">
        <ul>
            <td>
            <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </td>
               <td>
               <label for="password">password</label>
                <input type="password" name="password" id="password">
               </td>
            <td>
                 <label for="password2">Confirm Password :</label>
                <input type="password" name="password2" id="password2">
            </td>   
            <td>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama"><br><br><br>
            </td>
            <td>
                <button type="submit" name="register">Register</button>
            </td>
                <button type="submit" name="kembali"><a href="login.php">Kembali</a></button>
        </ul>
    </form>
    </fieldset>
    </div>
</body>
</html>