<?php include "koneksi.php"; ?>
<div class="row">
<div class="col-sm-6 col-lg-12">
    <!-- Widget -->
    <div class="widget">
        <div class="widget-simple">
            <h1>Hai <?php echo $_SESSION['namauser']; ?> </h3>
            <h3>Selamat Datang Kembali di Aplikasi Ujian Online</h3>
        </div>
    </div>
    </div>
    <?php
    if($_SESSION['status'] == 'admin'){
    ?>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <div class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                    <i class="fa fa-user"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    <strong><?php $tampil = mysqli_query($mysqli, "select count(namauser) as jumlah from user where status = 'siswa' ");
                    $hasil = mysqli_fetch_array($tampil);
                    echo $hasil = $hasil['jumlah'];?></strong><br>
                    <small>Siswa</small>
                </h3>
            </div>
        </div>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <div class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-default animation-fadeIn">
                    <i class="fa fa-file-text"></i>
                </div>
                <h2 class="widget-content text-right">
                    <strong><?php $tampil = mysqli_query($mysqli, "select count(namagroup) as jumlah from groupsoal");
                    $hasil = mysqli_fetch_array($tampil);
                    echo $hasil = $hasil['jumlah'];?></strong><br>
                    <small>Group Soal</small>
                </h2>
            </div>
        </div>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <div class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                    <i class="fa fa-file-text"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    <strong><?php $tampil = mysqli_query($mysqli, "select count(idujian) as jumlah from setujian where status = 'aktif' ");
                    $hasil = mysqli_fetch_array($tampil);
                    echo $hasil = $hasil['jumlah'];?></strong><br>
                    <small>Ujian Aktif</small>
                </h3>
            </div>
        </div>
        <!-- END Widget -->
    </div>
    <?php
    }
    ?>
</div>
