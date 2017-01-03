          <h1 class="page-header">Data Sekolah</h1>
        
<?php

//cek jml sekolah
$jmlsekolah = mysql_num_rows(mysql_query("SELECT * FROM sekolah")) or 0;
echo '<a class="btn btn-primary" href="'.DOMAIN.$uri[0].'/tambahdata">Tambah Data</a> <br /><br />
<div class="table-responsive">';
if ($jmlsekolah>=1) {
?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No. Sekolah</th>
                  <th>Nama Sekolah</th>
                  <th>Alamat Sekolah</th>
                  <th>Jumlah Guru</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
<?php $query = mysql_query("SELECT * FROM sekolah");
  while ($data = mysql_fetch_object($query)) {
                echo '<tr>
                  <td>'.$data->No.'</td>
                  <td>'.$data->Nama.'</td>
                  <td>'.$data->Alamat.'</td>
                  <td>'.$data->Jumlah_Guru.'</td>
                  <td><a href="'.DOMAIN.$uri[0].'/editdata/'.$data->No.'">Edit</a> &nbsp; <a href="'.DOMAIN.$uri[0].'/hapusdata/'.$data->No.'">Hapus</a></td>
                </tr>';
  } ?>
              </tbody>
            </table>
<?php } else {
echo 'DATA SEKOLAH TIDAK ADA';
} ?>
          </div>