<?php
// Tentukan Centroid
function hitung($id, $versi)
{
    $datano1 = 0;
    $datano2 = 0;
    $C1a = 0;
    $C2a = 0;
    $C1b = 0;
    $C2b = 0;
    $C1c = 0;
    $C2c = 0;
    $C1d = 0;
    $C2d = 0;
    $C1e = 0;
    $C2e = 0;
    $C1f = 0;
    $C2f = 0;
    $C1g = 0;
    $C2g = 0;
    $C1h = 0;
    $C2h = 0;
    $C1j = 0;
    $C2j = 0;
    $query1 = mysql_query('SELECT * FROM sekolah');
    $no = 1;
    while ($data1 = mysql_fetch_object($query1)) {
        if ($no == 1 || $no == $id) {
            if ($no == 1) {
             echo  $datano1 = $data1->No;
            } else if ($no == $id) {
             echo   $datano2 = $data1->No;
            }
            $C1a += ktn($data1->kGuruS1);
            $C1b += ktn($data1->kTeknis);
            $C1c += ktn($data1->kPrasarana);
            $C1d += ktn($data1->kBuku);
            $C1e += ktn($data1->kMutu);
            $C1f += ktn($data1->kJumlah);
            $C1g += ktn($data1->kSNP);
            $C1h += ktn($data1->kLulusan);
            $C1j += ktn($data1->kSarana);
        }
        $no++;
    }
    if ($id > 1) {
        $C1a = $C1a / 2;
        $C1b = $C1b / 2;
        $C1c = $C1c / 2;
        $C1d = $C1d / 2;
        $C1e = $C1e / 2;
        $C1f = $C1f / 2;
        $C1g = $C1g / 2;
        $C1h = $C1h / 2;
        $C1j = $C1j / 2;
    }
    if ($versi == 1) {
        $jmldata2 = mysql_num_rows(mysql_query('SELECT * FROM sekolah LIMIT 1,1')) or 0;
    } else {
        $jmldata2 = mysql_num_rows(mysql_query('SELECT * FROM sekolah WHERE No!=' . $datano1 . ' AND No!=' . $datano2)) or 0;
    }
    if ($jmldata2 > 0) {
        if ($versi == 1) {
            $query2 = mysql_query('SELECT * FROM sekolah LIMIT 1,1');

        } else {
            $query2 = mysql_query('SELECT * FROM sekolah WHERE No!=' . $datano1 . ' AND No!=' . $datano2)or 0;
        }
        while ($data2 = mysql_fetch_object($query2)) {
            $C2a += ktn($data2->kGuruS1);
            $C2b += ktn($data2->kTeknis);
            $C2c += ktn($data2->kPrasarana);
            $C2d += ktn($data2->kBuku);
            $C2e += ktn($data2->kMutu);
            $C2f += ktn($data2->kJumlah);
            $C2g += ktn($data2->kSNP);
            $C2h += ktn($data2->kLulusan);
            $C2j += ktn($data2->kSarana);
        }
       $C2a = $C2a / $jmldata2;
       $C2b = $C2b / $jmldata2;
       $C2c = $C2c / $jmldata2;
       $C2d = $C2d / $jmldata2;
       $C2e = $C2e / $jmldata2;
       $C2f = $C2f / $jmldata2;
       $C2g = $C2g / $jmldata2;
       $C2h = $C2h / $jmldata2;
       $C2j = $C2j / $jmldata2;
    }
    // hitung jarak data dengan centroid euclidean
    $query = mysql_query('SELECT * FROM sekolah');
    $sama = true;
    while ($data = mysql_fetch_object($query)) {
        //jarak dengan cluster1
        $Dc1 = sqrt(pow(ktn($data->kGuruS1) - $C1a, 2) + pow(ktn($data->kTeknis) - $C1b, 2) + pow(ktn($data->kPrasarana) - $C1c, 2) + pow(ktn($data->kBuku) - $C1d, 2) + pow(ktn($data->kMutu) - $C1e, 2) + pow(ktn($data->kJumlah) - $C1f, 2) + pow(ktn($data->kSNP) - $C1g, 2) + pow(ktn($data->kLulusan) - $C1h, 2)  + pow(ktn($data->kSarana) - $C1j, 2));
        //jarak dengan cluster2
        $Dc2 = sqrt(pow(ktn($data->kGuruS1) - $C2a, 2) + pow(ktn($data->kTeknis) - $C2b, 2) + pow(ktn($data->kPrasarana) - $C2c, 2) + pow(ktn($data->kBuku) - $C2d, 2) + pow(ktn($data->kMutu) - $C2e, 2) + pow(ktn($data->kJumlah) - $C2f, 2) + pow(ktn($data->kSNP) - $C2g, 2) + pow(ktn($data->kLulusan) - $C2h, 2)  + pow(ktn($data->kSarana) - $C2j, 2));
        if ($id == 1) {
            $prosesupdate = mysql_query('UPDATE sekolah SET Dc1=' . $Dc1 . ', Dc2=' . $Dc2 . ' WHERE No=' . $data->No);
        } else {
            $kelompok1 = ($Dc1 < $Dc2) ? 1 : 2;
            $kelompok2 = ($data->Dc1 < $data->Dc2) ? 1 : 2;
            if ($kelompok1 != $kelompok2) {
                $sama = false;
            }
            $prosesupdate = mysql_query('UPDATE sekolah SET Dc1=' . $Dc1 . ', Dc2=' . $Dc2 . ' WHERE No=' . $data->No);
        }
    }
    return $sama;
}

// tentukan kelompok
function kelompok($Dc1, $Dc2)
{
    $kelompok = ($Dc1 < $Dc2) ? 1 : 2;
    return $kelompok;
}

?>
<h1 class="page-header">Data Hasil Clustering</h1>

<?php

//cek jml sekolah
echo$jmlsekolah = mysql_num_rows(mysql_query("SELECT * FROM sekolah")) or 0;
echo '<div class="table-responsive">';
if ($jmlsekolah >= 1) {
    if ($jmlsekolah >= 2) {
        hitung(1, 1);
        if ($jmlsekolah >= 3) {
            $hasil = hitung(1, 2);
            $urutan = 2;
            while ($hasil == false && $urutan <= $jmlsekolah) {
                $hasil = hitung($urutan, 2);
                $urutan++;
            }
        }
    }
    ?>
    <table class="table table-striped">
        <thead>
        <tr valign="center">
            <th rowspan="2">No. Sekolah</th>
            <th rowspan="2">Nama Sekolah</th>
            <th colspan="9" style="text-align:center">Kriteria</th>
            <th rowspan="2">Dc1</th>
            <th rowspan="2">Dc2</th>
            <th rowspan="2">Kelompok</th>
        </tr>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9</th>
        </tr>
        </thead>
        <tbody>
        <?php $query = mysql_query("SELECT * FROM sekolah");
        while ($data = mysql_fetch_object($query)) {
            echo '<tr>
                  <td>' . $data->No . '</td>
                  <td>' . $data->Nama . '</td>
                  <td>' . ktn($data->kGuruS1) . '</td>
                  <td>' . ktn($data->kTeknis) . '</td>
                  <td>' . ktn($data->kPrasarana) . '</td>
                  <td>' . ktn($data->kBuku) . '</td>
                  <td>' . ktn($data->kMutu) . '</td>
                  <td>' . ktn($data->kJumlah) . '</td>
                  <td>' . ktn($data->kSNP) . '</td>
                  <td>' . ktn($data->kLulusan) . '</td>
                  <td>' . ktn($data->kSarana) . '</td>
                  <td>' . $data->Dc1 . '</td>
                  <td>' . $data->Dc2 . '</td>
                  <td>' . kelompok($data->Dc1, $data->Dc2) . '</td>
                </tr>';
        } ?>
        </tbody>
    </table>
<?php } else {
    echo 'DATA SEKOLAH TIDAK ADA';
} ?>
</div>