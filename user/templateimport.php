<?php
include "../koneksi.php";
header("Content-type: application/vnd-ms-excel");
header('Content-Disposition: attachment; filename=Template Upload User.xls');
?>

<table border="1">
<thead>
    <tr>
        <th class="text-center">Nama User</th>
        <th class="text-center">Jenis Kelamin (L/P)</th>
        <th class="text-center">Tempat Lahir</th>
        <th class="text-center">Tanggal Lahir</th>
        <th class="text-center">Role</th>
        <th class="text-center">Username</th>
        <th class="text-center">Password</th>
    </tr>
</thead>
</table>