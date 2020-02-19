<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $kdmapel = $_POST['kodemapel'];
    $mapel = $_POST['mapel'];

    $insert = mysqli_query($mysqli, "insert into mapel set kdmapel='$kdmapel', mapel='$mapel'");

    $selectid = mysqli_query($mysqli, "select idmapel from mapel where kdmapel='$kdmapel'");
    $idmapel = mysqli_fetch_array($selectid);
    $selecttahun = mysqli_query($mysqli, "select idtahun from tahunajaran where status='Y'");
    $idtahun = mysqli_fetch_array($selecttahun);
    $insert1 = mysqli_query($mysqli, "insert into gurumapel set idgurumapel='0', iduser='0', idmapel='$idmapel[idmapel]', idtahun='$idtahun[idtahun]'");

    if ($insert1) {
        header('location:http://'.$webaddress.'/index.php?mapel');
    } else {
        echo "<script>alert('Proses tambah mapel gagal');window.history.go(-1);</script>";
    }
} else {
    header('location:http://'.$webaddress.'/index.php?mapel');
}

