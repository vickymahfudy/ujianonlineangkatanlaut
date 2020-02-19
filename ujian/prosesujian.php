<?php
session_start();
include "../koneksi.php";
$user = $_SESSION['iduser'];
$_SESSION['idujian'] = $_POST['idujian'];

$n = mysqli_query($mysqli,"select * from nilai where iduser='$user' and idujian='$_SESSION[idujian]'");
$nilai = mysqli_num_rows($n);
if($nilai > 0){
    header('location:http://'.$webaddress.'/index.php?nilai');
}elseif(!empty($_SESSION['ujian'])){
    header('location:http://'.$webaddress.'/index.php?tes');
}elseif ($nilai == 0) {
    $token = $_POST['token'];

    $cek = mysqli_query($mysqli,"select * from setujian where idujian='$_SESSION[idujian]' and token='$token'");
    if(mysqli_num_rows($cek)>0){
        $data = mysqli_fetch_array($cek);
        $_SESSION['id'] =  $data['idgroup'];


        $soal = mysqli_query($mysqli, 
        "select s.*, st.*
        from soal as s
        inner join groupsoal as gs
        on gs.idgroup = s.idgroup
        inner join setujian as st 
        on st.idgroup = gs.idgroup
        where s.idgroup = '$_SESSION[id]'
        order by rand()
        limit $data[rangesoal]");
        $jumlah_soal = mysqli_num_rows($soal);
        for($i=1; $i<=$jumlah_soal; $i++){
            $data = mysqli_fetch_array($soal);
            mysqli_query($mysqli, "insert into jawaban set
            iduser = '$user', 
            idujian = '$_SESSION[idujian]',
            idsoal = '$data[idsoal]'
            ");
        }
        header('location:http://'.$webaddress.'/index.php?tes');
        //echo "<script>window.location.href='../index.php?tes'</script>";
    }else{
        echo "<script>alert('token yang anda masukkan salah !!');window.history.go(-1);</script>";
    }
}else{
    echo "<script>alert('anda tidak boleh mengakses halaman ini !!');window.history.go(-1);</script>";
}
?>