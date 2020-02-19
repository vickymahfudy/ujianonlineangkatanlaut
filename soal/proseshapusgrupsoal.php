<?php
include "../koneksi.php";

$idgroup = $_GET['idgroup'];
$deletegroup = mysqli_query($mysqli, "delete from groupsoal where idgroup='$idgroup' ");
$deletesoal = mysqli_query($mysqli,"delete from soal where idgroup='$idgroup'");

if($deletegroup || $deletesoal){
    echo "<script>alert('proses delete berhasil')";
    header('location:http://'.$webaddress.'/index.php?soal');
}else{
    echo "<script>alert('proses delete gagal');window.history.go(-1);</script>";
}

?>
