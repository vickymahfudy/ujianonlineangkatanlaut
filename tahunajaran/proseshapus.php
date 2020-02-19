<?php
include "../koneksi.php";

$idtahun = $_GET['idtahun'];

$delete = mysqli_query($mysqli, "delete from tahunajaran where idtahun='$idtahun' ");
if($delete){
    header('location:http://'.$webaddress.'/index.php?tahunajaran');
}else{
    echo "<script>alert('Proses delete gagal');window.history.go(-1);</script>";
}

?>