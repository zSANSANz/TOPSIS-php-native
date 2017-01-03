          <h1 class="page-header">Edit Data Sekolah</h1>
          <a href="<?php echo DOMAIN; ?>sekolah">&lt;&lt; Lihat Data</a>
      <br /><br />
      <div class="col-xs-12 col-sm-8 placeholder">
<?php
$uri[2] = isset($uri[2])?$uri[2]:0;
$_POST['no'] = is_numeric($uri[2])?$uri[2]:0;
$query = mysql_query("SELECT * FROM sekolah WHERE No=".$_POST['no']);
if ($data = mysql_fetch_object($query)) {
  $_POST['nama'] = isset($_POST['nama'])?$_POST['nama']:$data->Nama;
  $_POST['alamat'] = isset($_POST['alamat'])?$_POST['alamat']:$data->Alamat;
  $_POST['jmlguru'] = isset($_POST['jmlguru'])?$_POST['jmlguru']:$data->Jumlah_Guru;
if (isset($_POST['btnsimpandata'])) {
  $insert_sql = mysql_query("UPDATE sekolah SET Nama='".$_POST['nama']."', Alamat='".$_POST['alamat']."', Jumlah_Guru='".$_POST['jmlguru']."' WHERE No=".$_POST['no']) or die ('<div class="alert alert-danger"><strong>Gagal Mengubah Sekolah</strong><br/>Terjadi kesalahan, silahkan ulangi lagi.</div>');    
  echo '<div class="alert alert-success">
        <strong>Sukses</strong><br/>Data berhasil diubah.
      </div>';
}
?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
          <div class="form-group">
            <label for="nama">Nama Sekolah</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Sekolah" required autofocus value="<?php echo $_POST['nama']; ?>">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required value="<?php echo $_POST['alamat']; ?>">
          </div>
          <div class="form-group">
            <label for="jmlguru">Jumlah Guru</label>
            <input type="text" name="jmlguru" id="jmlguru" class="form-control" placeholder="Jumlah Guru" required value="<?php echo $_POST['jmlguru']; ?>">
          </div>
          <div class="form-group">
            <button class="btn btn-primary " type="submit" name="btnsimpandata">Simpan Data</button>
          </div>
        </form>
    </div>
    <div class="col-xs-12 col-sm-4 placeholder">
<?php
  $query = mysql_query("SELECT * FROM sekolah WHERE No=".$_POST['no']);
  if ($data = mysql_fetch_object($query)) {
    echo "<h4>Data Sekolah Ini</h4><br />No. Sekolah : ".$data->No."<br />Nama : ".$data->Nama."<br />Alamat : ".$data->Alamat."<br />Jumlah Guru : ".$data->Jumlah_Guru;
  }
}
 ?>
    </div>