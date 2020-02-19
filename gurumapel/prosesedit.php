<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $idgurumapel = $_POST['idgurumapel'];
    $iduser = $_POST['iduser'];
    $idmapel = $_POST['idmapel'];

    $cek = mysqli_query($mysqli, "select * from gurumapel where iduser='$iduser' and idmapel='$idmapel' and idtahun='$idtahun'");
    if(mysqli_num_rows($cek)>0){
        echo "<script>alert('Data baru tidak boleh sama dengan data sebelumnya');window.history.go(-1);</script>";
    }else{
        $insert = mysqli_query($mysqli, "update gurumapel set iduser='$iduser', idmapel='$idmapel' where idgurumapel='$idgurumapel'");
        if ($insert) {
            header('location:http://'.$webaddress.'/index.php?gurumapel');
        } else {
            echo "<script>alert('Proses tambah data gagal');window.history.go(-1);</script>";
        }
    }
} else {
    header('location:http://'.$webaddress.'/index.php?gurumapel');
}

