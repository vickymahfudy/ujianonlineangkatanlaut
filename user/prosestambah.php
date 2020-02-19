<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $namauser = $_POST['namauser'];
    $jk = $_POST['jk'];
    $tempatlahir = $_POST['tempatlahir'];
    $tgllahir = $_POST['tgllahir'];
    $status = $_POST['status'];
    $username = $_POST['username'];
    $password = base64_encode($_POST['password']);

    $insert = mysqli_query($mysqli, "insert into user set 
    namauser='$namauser',
    jk='$jk',
    tempatlahir='$tempatlahir',
    tgllahir='$tgllahir',
    status='$status',
    username='$username',
    password='$password'");
    if ($insert) {
        echo "<script>alert('proses tambah stock berhasil');'</script>";
        header('location:http://'.$webaddress.'/index.php?user');
    } else {
        echo "<script>alert('proses tambah stock gagal');window.history.go(-1);</script>";
    }
} else {
    header('location:http://'.$webaddress.'/index.php?user');
}

