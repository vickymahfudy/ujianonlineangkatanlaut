<?php
include "../koneksi.php";
session_start();

if (isset($_POST['submit'])) {
    if($_SESSION['status']=='admin'){
        $idgroup = $_POST['idgroup'];
        $statusgrup = $_POST['status'];
        $namagroup = $_POST['namagroup'];
        $idmapel = $_POST['idmapel'];

        $insert = mysqli_query($mysqli, "update groupsoal set 
        namagroup = '$namagroup',
        idmapel = '$idmapel',
        statusgrup = '$statusgrup'
        where idgroup='$idgroup'");

        if ($insert) {
            echo "<script>alert('proses edit berhasil');</script>";
            header('location:http://'.$webaddress.'/index.php?soal');
        } else {
            echo "<script>alert('proses edit gagal');window.history.go(-1);</script>";
        }   
    }
}else{
    header('location:http://'.$webaddress.'/index.php?soal');
}
?>

