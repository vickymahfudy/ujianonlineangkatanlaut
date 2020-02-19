<?php
include "../koneksi.php";

$idujian = $_GET['idujian'];
$delete = mysqli_query($mysqli, "delete from setujian where idujian='$idujian' ");
if($delete){
    echo "<script>alert('proses delete berhasil')";
    header('location:http://'.$webaddress.'/index.php?ujian');
}else{
    echo "<script>alert('proses delete gagal');window.history.go(-1);</script>";
}

?>
