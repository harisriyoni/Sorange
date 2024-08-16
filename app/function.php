<?php
function Registrasi($data){
    global $db;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);
    $nama = $data['nama'];
    
    //cek konfirmasi
    if ($password !== $password2) {
        echo "<script>alert('konfirmasi password tidak sesuai')</script>";
        return false;
    }
    //enkripsi pass
    //$password = password_hash($password, PASSWORD_DEFAULT);
    
    $password = md5($password);


    //tambah ke database
    mysqli_query($db, "INSERT INTO admin VALUE('', '$username', '$password', '$nama')");
    return mysqli_affected_rows($db);
}
?>