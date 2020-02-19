<?php
include "../koneksi.php";
?>

<table border="1">
<thead>
    <tr>
        <th width="20px" class="text-center">No</th>
        <th class="text-center">Username</th>
        <th class="text-center">Nama User</th>
        <th class="text-center">Jenis Kelamin</th>
        <th class="text-center">Tempat/Tanggal Lahir</th>
        <th class="text-center">Status</th>
    </tr>
</thead>
</table>
<table border="1">
<?php 
include ('koneksi.php');
$tampil = mysqli_query($mysqli, "select * from user where status not in ('guru')");
$no = 1;
while ($hasil = mysqli_fetch_array($tampil)) {
    header("Content-type: application/vnd-ms-excel");
    header('Content-Disposition: attachment; filename=Data Rekap User.xls');
    ?>
    <tr>
        <td width="20px" class="text-center"><?php echo $no++; ?></td>
        <td class="text-center"><?php echo $hasil['username'];?></td>
        <td class="text-center"><?php echo $hasil['namauser'];?></td>
        <td class="text-center"><?php echo $hasil['jk'] == 'laki-laki' ? 'Laki-laki' : 'Perempuan'; ?></td>
        <td class="text-center"><?php echo $hasil['tempatlahir'].', '.date('d F Y', strtotime($hasil['tgllahir']));?></td>
        <td class="text-center"><?php 
        if($hasil['status']=='admin'){echo "Admin"; }
        if($hasil['status']=='guru'){echo "Guru"; }
        if($hasil['status']=='siswa'){echo "Siswa"; }
        ?>
    </tr>
    <?php } ?>
    </table>