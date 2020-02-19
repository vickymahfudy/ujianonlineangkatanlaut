<?php
include "../koneksi.php";
session_start();

if (isset($_POST['submit'])) {
    $iduser = $_POST['iduser'];
    $namagroup = $_POST['namagroup'];
    $idmapel = $_POST['idmapel'];

    $insert = mysqli_query($mysqli, "insert into groupsoal (namagroup, idmapel, idgurumapel, statusgrup) values ('".$namagroup."','".$idmapel."','0','N')");

    if ($insert) {
        echo "<script>alert('proses tambah group soal berhasil');'</script>";
        header('location:http://'.$webaddress.'/index.php?soal');
    } else {
        echo "<script>alert('proses tambah group soal gagal');window.history.go(-1);</script>";
    }
} else {
    header('location:http://'.$webaddress.'/index.php?soal');
}

