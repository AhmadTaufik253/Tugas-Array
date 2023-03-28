<?php

$m1 = ['NIM'=>'2011501661','nama'=>'Ahmad', 'nilai'=>80];
$m2 = ['NIM'=>'2011501662','nama'=>'Taufik', 'nilai'=>70];
$m3 = ['NIM'=>'2011501663','nama'=>'Aurahman', 'nilai'=>50];
$m4 = ['NIM'=>'2011501664','nama'=>'Topik', 'nilai'=>45];
$m5 = ['NIM'=>'2011501665','nama'=>'Aura', 'nilai'=>90];
$m6 = ['NIM'=>'2011501666','nama'=>'Rahman', 'nilai'=>75];
$m7 = ['NIM'=>'2011501667','nama'=>'Budi', 'nilai'=>25];
$m8 = ['NIM'=>'2011501668','nama'=>'Opik', 'nilai'=>85];

$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8];
$ar_judul = ['No','NIM','Nama','Nilai','Grade','Predikat'];

// keterangan
$jumlah_mahasiswa = count($mahasiswa);
$jml_nil = array_column($mahasiswa,'nilai');
$total = array_sum($jml_nil);
$rata_rata = $total / $jumlah_mahasiswa;
$nilai_tertinggi = max($jml_nil);
$nilai_terendah = min($jml_nil);
$keterangan = [
    'Jumlah Mahasiswa'=>$jumlah_mahasiswa,
    'Nilai Tertinggi'=>$nilai_tertinggi,
    'Nilai Terendah'=>$nilai_terendah,
    'Total Nilai'=>$total,
    'Rata - Rata'=>$rata_rata,
];

?>

<table border="1" width="100%" bgcolor="#f2f2f2" > 
    <thead>
        <tr>
            <?php
                foreach ($ar_judul as $j) {
            ?>
            <th><?= $j ?></th>

            <?php } ?>
        </tr>
    </thead>
    <tbody style="text-align:center;">
        <?php
        $no=1;
        foreach ($mahasiswa as $mhs) {
            $ket = ($mhs['nilai']>=60) ? 'Lulus' : "Tidak Lulus";

            // membuat grade
            if($mhs['nilai'] >= 85 && $mhs['nilai'] <= 100) $grade = "A";
            else if($mhs['nilai'] >= 75 && $mhs['nilai'] <= 84) $grade = "B";
            else if($mhs['nilai'] >= 60 && $mhs['nilai'] <= 74) $grade = "C";
            else if($mhs['nilai'] >= 30 && $mhs['nilai'] <= 59) $grade = "D";
            else if($mhs['nilai'] >= 0 && $mhs['nilai'] <= 29) $grade = "E";
            else $grade = "";

            // membuat predikat
            switch ($grade) {
                case "A": $predikat = "Memuaskan";  break;
                case "B": $predikat = "Bagus";  break;
                case "C": $predikat = "Cukup";  break;
                case "D": $predikat = "Kurang";  break;
                case "E": $predikat = "Buruk";  break;
                default: $predikat = ""; break;
            }


            ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $mhs['NIM'] ?></td>
                <td><?= $mhs['nama'] ?></td>
                <td><?= $mhs['nilai'] ?></td>
                <td><?= $grade ?></td>
                <td><?= $predikat ?></td>
            </tr>

        <?php $no++; } ?>
    </tbody>
    <tfoot>
        <?php
            foreach ($keterangan as $ket => $hasil) {
            
        ?>
        <tr>
            <th colspan="4"><?= $ket ?></th>
            <th colspan="2"><?= $hasil ?></th>
        </tr>
        <?php } ?>
    </tfoot>
</table>