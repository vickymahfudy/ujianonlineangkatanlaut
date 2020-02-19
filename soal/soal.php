<?php include ('koneksi.php'); 
?>
<!-- Datatables Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-table"></i>Group Soal
        </h1>
    </div>
</div>
<!-- END Datatables Header -->

<!-- Datatables Content -->
<div class="block full">
    <?php if($_SESSION['status']=='admin'){?>
    <a class="btn btn-sm btn-info" data-placement="bottom" title="Tambah Soal" onclick="$('#modal-user-settings').modal('show');">Tambah Group</a>
    <div class="modal fade" id="modal-user-settings" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title"></i>Tambah Grup Soal</h3>
                </div>
                <!-- END Modal Header -->
                <?php 
                    $t = mysqli_query($mysqli, 
                    "select * from mapel");
                ?>
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="soal/prosestambahgrupsoal.php" method="post" >
                        <input type="hidden" value="<?php echo $_SESSION['iduser']; ?>" name="iduser">
                        <div class="form-group">
                            <label>Group Soal</label>
                            <div>
                                <input type="text" name="namagroup" value="" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >Mata Pelajaran</label>
                            <div >
                                <select name="idmapel" class="form-control" required>
                                <?php while($hasil = mysqli_fetch_array($t)){ ?>
                                    <option value="<?php echo $hasil['idmapel']; ?>"><?php echo $hasil['mapel']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group form-actions">
                            <div >
                                <button type="submit" name="submit" class="btn btn-sm btn-primary">Tambah Group Soal</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- END Modal Body -->
            </div>
        </div>
    </div>
    <?php } ?>
    <br>
    <br>
    <div class="table-responsive">
        <table id="example-datatable" class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tahun Soal</th>
                    <th class="text-center">Group Soal</th>
                    <th class="text-center">Mata Pelajaran</th>
                    <th class="text-center">Jumlah Soal</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $tampil = mysqli_query($mysqli, 
                "select gs.*, t.tahun, m.mapel, m.idmapel
                from groupsoal as gs
                inner join mapel as m
                on gs.idmapel = m.idmapel
                inner join tahunajaran as t
                on t.idtahun = (select idtahun from tahunajaran where status='Y')");
                $no = 1;
                while ($hasil = mysqli_fetch_array($tampil)) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo $hasil['tahun']; ?></td>
                        <td class="text-center"><?php echo $hasil['namagroup'];?></td>
                        <td class="text-center"><?php echo $hasil['mapel'];?></td>
                        <td class="text-center">
                        <?php
                        
                        $j = mysqli_query($mysqli, "select * from soal where idgroup = '$hasil[idgroup]'");
                        $jumlah = mysqli_num_rows($j);
                        echo $jumlah;
                        ?> Soal
                        </td>
                        <td class="text-center">
                        <?php if($hasil['statusgrup']=="Y"){ ?>
                            <span class="label label-success">Verified</span>
                        <?php }else{ ?>
                            <span class="label label-danger">Not Verified</span>
                        <?php }?>
                        </td>
                        <!--<td class="text-center"></td>-->
                        <td class="text-center">
                            <a href="detailsoal/eksportword.php?idgroup=<?php echo $hasil['idgroup']; ?>" title="Download Soal" class="btn btn-sm btn-info">
                            <i class="gi gi-download"></i></a>
                            <a href="index.php?detailsoal&idgroup=<?php echo $hasil['idgroup']; ?>" title="Detail" class="btn btn-sm btn-success">
                            <i class="fa fa-eye"></i></a>
                           <?php
                            if($_SESSION['status']=='admin'){
                        ?>
                            <a class="btn btn-sm btn-info" data-placement="bottom" title="Edit" onclick="$('#modal-user-settings<?php echo $hasil['idgroup']; ?>').modal('show');"><i class="fa fa-edit"></i></a>
                            <a onclick="return confirm('Penghapusan group soal akan menghapus semua soal yang telah diinput di dalamanya, apakah anda yakin ingin menghapus group soal ? ');" href="soal/proseshapusgrupsoal.php?idgroup=<?php echo $hasil['idgroup']; ?>" title="Delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a
                            <?php }elseif($_SESSION['status']=='guru'){ ?>
                            <a class="btn btn-sm btn-info" data-placement="bottom" title="Edit" onclick="$('#modal-user-settings<?php echo $hasil['idgroup']; ?>').modal('show');"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a
                            <?php }else{ ?>
                                <a class="btn btn-sm btn-info" disabled><i class="fa fa-edit"></i></a>
                            <a class="btn btn-sm btn-danger" disabled><i class="fa fa-trash"></i></a
                            <?php } ?>
                        </td>
                    </tr>
                    <div class="modal fade" id="modal-user-settings<?php echo $hasil['idgroup']; ?>" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <?php if($_SESSION['status']=='admin'){?>
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h3 class="modal-title"></i>Edit Grup Soal</h3>
                                </div>
                                <!-- END Modal Header -->

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form action="soal/proseseditgrupsoal.php" method="post" >
                                    <input type="hidden" name="idgroup" value="<?php echo $hasil['idgroup']; ?>">
                                        <div class="form-group">
                                            <label>Group Soal</label>
                                            <div>
                                                <input type="text" name="namagroup" value="<?php echo $hasil['namagroup']; ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >Mata Pelajaran</label>
                                            <div >
                                                <select name="idmapel" class="form-control">
                                                <?php
                                                    $m = mysqli_query($mysqli, "select * from mapel");
                                                    while ($mapel = mysqli_fetch_array($m)) {
                                                ?>
                                                <option <?php if($hasil['idmapel']==$mapel['idmapel']){ echo "selected"; } ?> value="<?php echo $mapel['idmapel']; ?>"><?php echo $mapel['mapel']; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label >Verifikasi</label>
                                            <select class="form-control" name="status">
                                                <option <?php if($hasil['statusgrup'] == 'Y'){echo "selected"; } ?> value="Y">Aktif</option>
                                                <option <?php if($hasil['statusgrup'] == 'N'){echo "selected"; }?> value="N">Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-actions">
                                            <div >
                                                <button type="submit" name="submit" class="btn btn-sm btn-primary">Edit Grup Soal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- END Modal Body -->
                            </div>
                            <?php }elseif($_SESSION['status']=='admin'){?>
                                <div class="modal-content">
                                <div class="modal-header text-center">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                    <h3 class="modal-title"></i>Verifikasi Grup Soal</h3>
                                </div>
                                <!-- END Modal Header -->

                                <!-- Modal Body -->
                                <div class="modal-body">
                                    <form action="soal/proseseditgrupsoal.php" method="post" >
                                    <input type="hidden" name="idgroup" value="<?php echo $hasil['idgroup']; ?>">
                                        <div class="form-group">
                                            <label >Verifikasi</label>
                                            <select class="form-control" name="status">
                                                <option <?php if($hasil['statusgrup'] == 'Y'){echo "selected"; } ?> value="Y">Aktif</option>
                                                <option <?php if($hasil['statusgrup'] == 'N'){echo "selected"; }?> value="N">Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-actions">
                                            <div >
                                                <button type="submit" name="submit" class="btn btn-sm btn-primary">Edit Grup Soal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- END Modal Body -->
                            </div>
                            <?php } ?>
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



