          <h1 class="page-header">Tambah Data Sekolah</h1>
          <a href="<?php echo DOMAIN; ?>sekolah">&lt;&lt; Lihat Data</a>
      <br /><br />
      <div class="col-xs-12 col-sm-8 placeholder">
<?php
$_POST['nama'] = isset($_POST['nama'])?$_POST['nama']:'';
$_POST['alamat'] = isset($_POST['alamat'])?$_POST['alamat']:'';
$_POST['jmlguru'] = isset($_POST['jmlguru'])?$_POST['jmlguru']:'';
if (isset($_POST['btntambahdata'])) {
  $insert_sql = mysql_query("INSERT INTO sekolah (Nama,Alamat,Jumlah_Guru) VALUES ('".$_POST['nama']."','".$_POST['alamat']."','".$_POST['jmlguru']."')") or die ('<div class="alert alert-danger"><strong>Gagal Menambah Sekolah</strong><br/>Terjadi kesalahan, silahkan ulangi lagi.</div>');    
  echo '<div class="alert alert-success">
        <strong>Sukses</strong><br/>Penambahan data berhasil.
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
            <button class="btn btn-primary " type="submit" name="btntambahdata">Tambah Data</button>
          </div>
        </form>
    </div>
    <div class="col-xs-12 col-sm-4 placeholder">
<?php //cek data
$jmlsekolah = mysql_num_rows(mysql_query("SELECT * FROM sekolah")) or 0;
$guru = mysql_fetch_object(mysql_query("SELECT SUM(Jumlah_Guru) as jml FROM sekolah"));
$jmlguru = $guru->jml;
echo "<h4>Data Sekolah</h4><br />Jumlah Sekolah Saat Ini : ".$jmlsekolah."<br />Jumlah Guru Saat Ini : ".$jmlguru;
 ?>
    </div>