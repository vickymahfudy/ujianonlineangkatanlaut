<?php include ('koneksi.php'); ?>
<!-- Datatables Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-table"></i>Data Ujian
        </h1>
    </div>
</div>
<!-- END Datatables Header -->

<!-- Datatables Content -->
<div class="block full">
    <div class="table-responsive">
        <table id="example-datatable" class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Group Soal</th>
                    <th class="text-center">Mata Pelajaran</th>
                    <th class="text-center">Waktu</th>
                    <th class="text-center">Jumlah Soal</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $tampil = mysqli_query($mysqli, 
                "select su.*, gs.*, m.*
                from setujian as su 
                inner join groupsoal as gs
                on su.idgroup = gs.idgroup
                inner join mapel as m
                on gs.idmapel = m.idmapel where su.status = 'aktif' ");
                $no = 1;
                while ($hasil = mysqli_fetch_array($tampil)) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        
                        <td class="text-center"><?php echo $hasil['namagroup'];?></td>
                        <td class="text-center"><?php echo $hasil['mapel']; ?></td>
                        <td class="text-center"><?php echo $hasil['waktu'].' menit';?></td>
                        <td class="text-center"><?php echo $hasil['rangesoal']; ?> Soal</td>
                        <!--<td class="text-center"></td>-->
                        <td class="text-center">
                            <a onclick="$('#modal-user-settings<?php echo $hasil['idujian']; ?>').modal('show');" title="Delete" class="btn btn-xs btn-default"><i class="gi gi-stopwatch"></i> Ambil Ujian</a
                        </td>
                        </tr>
                    <div class="modal fade" id="modal-user-settings<?php echo $hasil['idujian']; ?>" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h3 class="modal-title"></i>Masukan Token Soal</h3>
                                </div>
                                <!-- END Modal Header -->

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form action="ujian/prosesujian.php" method="post" >
                                    <input type="hidden" name="idujian" value="<?php echo $hasil['idujian']; ?>">
                                        <div class="form-group">
                                            <label>Token Soal</label>
                                            <div>
                                                <input placeholder="Token Soal"  value="" name="token" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group form-actions">
                                            <div >
                                                <button type="submit" name="submit" class="btn btn-sm btn-primary">Masuk</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- END Modal Body -->
                            </div>
                        </div>
                    </div>
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



