<?php
include "../koneksi.php";

$iduser = $_GET['id'];
$delete = mysqli_query($mysqli, "delete from user where iduser='$iduser' ");
if($delete){
    echo "<script>alert('proses delete berhasil')</script>";
    header('location:http://'.$webaddress.'/index.php?user');
}else{
    echo "<script>alert('proses delete gagal');window.history.go(-1);</script>";
}

?>
