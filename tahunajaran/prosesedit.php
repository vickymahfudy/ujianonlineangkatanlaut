<?php

include "../koneksi.php";

$idtahun = $_POST['idtahun'];
$tahun = $_POST['tahun'];
$status = $_POST['status'];


$insert = mysqli_query($mysqli, "update tahunajaran set tahun='$tahun', status='$status' where idtahun='$idtahun'");
if ($insert) {
    header('location:http://'.$webaddress.'/index.php?tahunajaran');
} else {
    echo "<script>alert('Proses edit gagal');window.history.go(-1);</script>";
}
?>