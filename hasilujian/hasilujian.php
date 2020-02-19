<?php include ('koneksi.php'); ?>
<!-- Datatables Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-table"></i>Nilai Ujian
        </h1>
    </div>
</div>
<!-- END Datatables Header -->

<!-- Datatables Content -->
<div class="block full">
    <br>
    <br>
    <div class="table-responsive">
        <table id="example-datatable" class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tanggal Ujian</th>
                    <th class="text-center">Group Soal</th>
                    <th class="text-center">Mata Pelajaran</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Status</th>
                <?php
                if($_SESSION['status'] == 'siswa'){
                    $tampil = mysqli_query($mysqli, "select n.*, s.*, gs.*, m.*
                    from nilai as n
                    inner join setujian as s
                    inner join groupsoal as gs
                    inner join mapel as m
                    on n.idujian = s.idujian and 
                    s.idgroup = gs.idgroup AND
                    gs.idmapel = m.idmapel where n.iduser = '$_SESSION[iduser]'
                    ");
                }
                ?>
                </tr>
            </thead>
            <tbody>
            <?php
                $no = 1;
                while ($hasil = mysqli_fetch_array($tampil)) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo $hasil['tgl']; ?></td>
                        <td class="text-center"><?php echo $hasil['namagroup']; ?></td>
                        <td class="text-center"><?php echo $hasil['mapel']; ?></td>
                        <td class="text-center"><?php echo $hasil['nilai'];?></td>
                <td class="text-center"><?php 
                if($hasil['nilai']>=85){ 
                    echo '<span class="label label-success">Sangat Baik</span>' ;
                }elseif($hasil['nilai']>=70){ 
                    echo '<span class="label label-success">Baik</span>';
                }elseif($hasil['nilai']>=60){
                    echo '<span class="label label-warning">Cukup</span>';
                }else{
                    echo '<span class="label label-danger">Mengulang</span>';
                } ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- END Datatables Content -->
<!-- END Page Wrapper -->

<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- END User Settings -->



