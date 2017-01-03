          <h1 class="page-header">Data Paremeter Kriteria</h1>
        
<?php

//cek jml sekolah
$jmlsekolah = mysql_num_rows(mysql_query("SELECT * FROM sekolah")) or 0;
echo '
<div class="table-responsive">';
if ($jmlsekolah>=1) {
?>
            <table class="table table-striped">
              <thead>
                <tr valign="center">
                  <th rowspan="2">No. Sekolah</th>
                  <th rowspan="2">Nama Sekolah</th>
                  <th colspan="10" style="text-align:center">Kriteria</th>
                  <th rowspan="2">Aksi</th>
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
                  <th>10</th>
                </tr>
              </thead>
              <tbody>
<?php $query = mysql_query("SELECT * FROM sekolah");
  while ($data = mysql_fetch_object($query)) {
                echo '<tr>
                  <td>'.$data->No.'</td>
                  <td>'.$data->Nama.'</td>
                  <td>'.ktn($data->kGuruS1).'</td>
                  <td>'.ktn($data->kTeknis).'</td>
                  <td>'.ktn($data->kPrasarana).'</td>
                  <td>'.ktn($data->kBuku).'</td>
                  <td>'.ktn($data->kMutu).'</td>
                  <td>'.ktn($data->kJumlah).'</td>
                  <td>'.ktn($data->kSNP).'</td>
                  <td>'.ktn($data->kLulusan).'</td>
                  <td>'.ktn($data->kJumlah_Guru).'</td>
                  <td>'.ktn($data->kSarana).'</td>
                  <td><a href="'.DOMAIN.$uri[0].'/editdata/'.$data->No.'">Edit</a> </td>
                </tr>';
  } ?>
              </tbody>
            </table>
<?php } else {
echo 'DATA SEKOLAH TIDAK ADA';
} ?>
          </div>