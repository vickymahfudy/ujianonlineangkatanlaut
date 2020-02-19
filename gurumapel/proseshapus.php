<?php
include "../koneksi.php";

$idgurumapel = $_GET['idgurumapel'];

$delete = mysqli_query($mysqli, "delete from gurumapel where idgurumapel='$idgurumapel' ");
if($delete){
    echo "<script>alert('Proses delete berhasil')</script>";
    header('location:http://'.$webaddress.'/index.php?gurumapel');
}else{
    echo "<script>alert('Proses delete gagal');window.history.go(-1);</script>";
}

?>