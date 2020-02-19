<?php
include "../koneksi.php";

$idmapel = $_GET['idmapel'];

$delete = mysqli_query($mysqli, "delete from mapel where idmapel='$idmapel' ");
if($delete){
    header('location:http://'.$webaddress.'/index.php?mapel');
}else{
    echo "<script>alert('Proses delete gagal');window.history.go(-1);</script>";
}

?>