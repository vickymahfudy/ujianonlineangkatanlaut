<?php 
// error_reporting(1);
include 'koneksi.php'; 
$idgroup = $_GET['idgroup'];
$f = $_GET['f']?$_GET['f']:"";
?>
    <!-- Datatables Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-table"></i>
            <?php 
            $tampil = mysqli_query($mysqli,"select gs.*, t.tahun, m.mapel, m.idmapel
            from groupsoal as gs
            inner join mapel as m
            on gs.idmapel = m.idmapel
            inner join tahunajaran as t
            on t.idtahun = (select idtahun from tahunajaran where status='Y')
            where gs.idgroup=".$idgroup."");
            $hasil = mysqli_fetch_array($tampil);
            echo $hasil['namagroup'];
            ?>
        </h1>
    </div>
</div>
<!-- END Datatables Header -->

<!-- Datatables Content -->
<div class="block full">
    <div class="block-title">
        <ul class="nav nav-tabs">
            <li <?php if($f==1 || $f==""){ ?>class="active"<?php } ?>><a href="index.php?detailsoal&f=1&idgroup=<?php echo $idgroup ?>"><h4><i class="fa fa-th-large"></i> Soal Pilihan Ganda</h4></a></li>
        </ul>
    </div>
    <div class="tab-content">
        <?php
        
        if($f=="1" || $f==""){
            include_once "soalpilihanganda/soalpilihanganda.php";
        }
        ?>
    </div>
</div>
<?php


