        <h1 class="page-header">Laporan SPM</h1>
        
<?php         
//cek jml sekolah
$jmlsekolah = mysql_num_rows(mysql_query("SELECT * FROM sekolah")) or 0;
echo '
<div class="table-responsive">';
if ($jmlsekolah>=1) {
?>
<a class="btn btn-primary" href="<?php echo DOMAIN; ?>cetaklaporan.php" target="_blank"> &nbsp; PRINT &nbsp; </a> <br /><br />
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No. Sekolah</th>
                  <th>Nama Sekolah</th>
                  <th>Alamat Sekolah</th>
                  <th>Jumlah Guru</th>
                  <th>Kelompok</th>
                  <th>SPM</th>
                </tr>
              </thead>
              <tbody>
<?php $query = mysql_query("SELECT * FROM sekolah");
  while ($data = mysql_fetch_object($query)) {
    $kelompok = ($data->Dc1<$data->Dc2)?1:2;
    $spm      = ($kelompok==1)?"SPM":"Non SPM";
                echo '<tr>
                  <td>'.$data->No.'</td>
                  <td>'.$data->Nama.'</td>
                  <td>'.$data->Alamat.'</td>
                  <td>'.$data->Jumlah_Guru.'</td>
                  <td>'.$kelompok.'</td>
                  <td>'.$spm.'</td>
                </tr>';
  } ?>
              </tbody>
            </table>
<?php } else {
echo 'DATA SEKOLAH TIDAK ADA';
} ?>
          </div>