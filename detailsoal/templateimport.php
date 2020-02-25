<?php
include "../koneksi.php";
header("Content-type: application/vnd-ms-excel");
header('Content-Disposition: attachment; filename=Template Upload Soal.xls');
?>

<table border="1">
<thead>
    <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Soal</th>
        <th class="text-center">Pilihan A</th>
        <th class="text-center">Pilihan B</th>
        <th class="text-center">Pilihan C</th>
        <th class="text-center">Pilihan D</th>
        <th class="text-center">Pilihan E</th>
        <th class="text-center">Pilihan Benar</th>
        <th class="text-center">Pembahasan</th>
    </tr>
</thead>
</table>