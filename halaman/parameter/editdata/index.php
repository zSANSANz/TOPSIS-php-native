          <h1 class="page-header">Edit Parameter Kriteria Sekolah</h1>
          <a href="<?php echo DOMAIN; ?>parameter">&lt;&lt; Lihat Data</a>
      <br /><br />
      <div class="col-xs-12 col-sm-8 placeholder">
<?php
$uri[2] = isset($uri[2])?$uri[2]:0;
$_POST['no'] = is_numeric($uri[2])?$uri[2]:0;
$query = mysql_query("SELECT * FROM sekolah WHERE No=".$_POST['no']);
if ($data = mysql_fetch_object($query)) {
  $_POST['kGuruS1']=isset($_POST['kGuruS1'])?$_POST['kGuruS1']:$data->kGuruS1;
  $_POST['kTeknis']=isset($_POST['kTeknis'])?$_POST['kTeknis']:$data->kTeknis;
  $_POST['kPrasarana']=isset($_POST['kPrasarana'])?$_POST['kPrasarana']:$data->kPrasarana;
  $_POST['kBuku']=isset($_POST['kBuku'])?$_POST['kBuku']:$data->kBuku;
  $_POST['kMutu']=isset($_POST['kMutu'])?$_POST['kMutu']:$data->kMutu;
  $_POST['kJumlah']=isset($_POST['kJumlah'])?$_POST['kJumlah']:$data->kJumlah;
  $_POST['kSNP']=isset($_POST['kSNP'])?$_POST['kSNP']:$data->kSNP;
  $_POST['kLulusan']=isset($_POST['kLulusan'])?$_POST['kLulusan']:$data->kLulusan;
  $_POST['kJumlah_Guru']=isset($_POST['kJumlah_Guru'])?$_POST['kJumlah_Guru']:$data->kJumlah_Guru;
  $_POST['kSarana']=isset($_POST['kSarana'])?$_POST['kSarana']:$data->kSarana;

if (isset($_POST['btnsimpandata'])) {
  $insert_sql = mysql_query("UPDATE sekolah SET kGuruS1='".$_POST['kGuruS1']."', kTeknis='".$_POST['kTeknis']."', kPrasarana='".$_POST['kPrasarana']."', kBuku='".$_POST['kBuku']."', kMutu='".$_POST['kMutu']."', kJumlah='".$_POST['kJumlah']."', kSNP='".$_POST['kSNP']."', kLulusan='".$_POST['kLulusan']."', kJumlah_Guru='".$_POST['kJumlah_Guru']."', kSarana='".$_POST['kSarana']."' WHERE No=".$_POST['no']) or die ('<div class="alert alert-danger"><strong>Gagal Mengubah Parameter Kriteria</strong><br/>Terjadi kesalahan, silahkan ulangi lagi.</div>');    
  echo '<div class="alert alert-success">
        <strong>Sukses</strong><br/>Data berhasil diubah.
      </div>';

}
?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
          <h2><?php echo $data->Nama; ?></h2>
          <div class="input-group">
            <span class="input-group-addon" for="kGuruS1">Guru S1</span>
            <select class="form-control"  name="kGuruS1">
              <option value="1" <?php echo ($_POST['kGuruS1']==1)?'selected="selected"':''; ?> >&gt;=100%</option>
              <option value="2" <?php echo ($_POST['kGuruS1']==2)?'selected="selected"':''; ?> >&lt;=90%</option>
              <option value="3" <?php echo ($_POST['kGuruS1']==3)?'selected="selected"':''; ?> >&lt;=80%</option>
              <option value="4" <?php echo ($_POST['kGuruS1']==4)?'selected="selected"':''; ?> >&lt;=70%</option>
              <option value="5" <?php echo ($_POST['kGuruS1']==5)?'selected="selected"':''; ?> >&lt;=60%</option>
              <option value="6" <?php echo ($_POST['kGuruS1']==6)?'selected="selected"':''; ?> >&lt;50%</option>
            </select>
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon" for="kTeknis">Standar Teknis</span>
            <select class="form-control"  name="kTeknis">
              <option value="1" <?php echo ($_POST['kTeknis']==1)?'selected="selected"':''; ?> >&gt;=100% Lengkap</option>
              <option value="2" <?php echo ($_POST['kTeknis']==2)?'selected="selected"':''; ?> >90% Lengkap</option>
              <option value="3" <?php echo ($_POST['kTeknis']==3)?'selected="selected"':''; ?> >80% Lengkap</option>
              <option value="4" <?php echo ($_POST['kTeknis']==4)?'selected="selected"':''; ?> >70% Lengkap</option>
              <option value="5" <?php echo ($_POST['kTeknis']==5)?'selected="selected"':''; ?> >60% Lengkap</option>
              <option value="6" <?php echo ($_POST['kTeknis']==6)?'selected="selected"':''; ?> >&lt;50%</option>
            </select>
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon" for="kPrasarana">Prasarana Minimal</span>
            <select class="form-control"  name="kPrasarana">
              <option value="1" <?php echo ($_POST['kPrasarana']==1)?'selected="selected"':''; ?> >Sangat Baik</option>
              <option value="2" <?php echo ($_POST['kPrasarana']==2)?'selected="selected"':''; ?> >Baik</option>
              <option value="3" <?php echo ($_POST['kPrasarana']==3)?'selected="selected"':''; ?> >Sedang</option>
              <option value="4" <?php echo ($_POST['kPrasarana']==4)?'selected="selected"':''; ?> >Cukup</option>
              <option value="5" <?php echo ($_POST['kPrasarana']==5)?'selected="selected"':''; ?> >Kurang</option>
              <option value="6" <?php echo ($_POST['kPrasarana']==6)?'selected="selected"':''; ?> >Sangat Kurang</option>
            </select>
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon" for="kBuku">Kelengkapan Buku</span>
            <select class="form-control"  name="kBuku">
              <option value="1" <?php echo ($_POST['kBuku']==1)?'selected="selected"':''; ?> >Sangat Lengkap</option>
              <option value="2" <?php echo ($_POST['kBuku']==2)?'selected="selected"':''; ?> >Lengkap</option>
              <option value="3" <?php echo ($_POST['kBuku']==3)?'selected="selected"':''; ?> >Sedang</option>
              <option value="4" <?php echo ($_POST['kBuku']==4)?'selected="selected"':''; ?> >Cukup</option>
              <option value="5" <?php echo ($_POST['kBuku']==5)?'selected="selected"':''; ?> >Kurang</option>
              <option value="6" <?php echo ($_POST['kBuku']==6)?'selected="selected"':''; ?> >Sangat Kurang</option>
            </select>
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon" for="kMutu">Uji Sampel Mutu</span>
            <select class="form-control"  name="kMutu">
              <option value="1" <?php echo ($_POST['kMutu']==1)?'selected="selected"':''; ?> >Sangat Baik</option>
              <option value="2" <?php echo ($_POST['kMutu']==2)?'selected="selected"':''; ?> >Baik</option>
              <option value="3" <?php echo ($_POST['kMutu']==3)?'selected="selected"':''; ?> >Sedang</option>
              <option value="4" <?php echo ($_POST['kMutu']==4)?'selected="selected"':''; ?> >Cukup</option>
              <option value="5" <?php echo ($_POST['kMutu']==5)?'selected="selected"':''; ?> >Kurang</option>
              <option value="6" <?php echo ($_POST['kMutu']==6)?'selected="selected"':''; ?> >Sangat Kurang</option>
            </select>
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon" for="kJumlah">Jumlah siswa SD/MI (30-40)/kelas</span>
            <select class="form-control"  name="kJumlah">
              <option value="1" <?php echo ($_POST['kJumlah']==1)?'selected="selected"':''; ?> >Sangat Memenuhi</option>
              <option value="2" <?php echo ($_POST['kJumlah']==2)?'selected="selected"':''; ?> >Memenuhi</option>
              <option value="3" <?php echo ($_POST['kJumlah']==3)?'selected="selected"':''; ?> >Sedang</option>
              <option value="4" <?php echo ($_POST['kJumlah']==4)?'selected="selected"':''; ?> >Cukup</option>
              <option value="5" <?php echo ($_POST['kJumlah']==5)?'selected="selected"':''; ?> >Kurang</option>
              <option value="6" <?php echo ($_POST['kJumlah']==6)?'selected="selected"':''; ?> >Sangat Kurang Memenuhi</option>
            </select>
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon" for="kSNP">Standar Nasional Pendidikan</span>
            <select class="form-control"  name="kSNP">
              <option value="1" <?php echo ($_POST['kSNP']==1)?'selected="selected"':''; ?> >Sangat Baik</option>
              <option value="2" <?php echo ($_POST['kSNP']==2)?'selected="selected"':''; ?> >Baik</option>
              <option value="3" <?php echo ($_POST['kSNP']==3)?'selected="selected"':''; ?> >Sedang</option>
              <option value="4" <?php echo ($_POST['kSNP']==4)?'selected="selected"':''; ?> >Cukup</option>
              <option value="5" <?php echo ($_POST['kSNP']==5)?'selected="selected"':''; ?> >Kurang</option>
              <option value="6" <?php echo ($_POST['kSNP']==6)?'selected="selected"':''; ?> >Sangat Kurang</option>
            </select>
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon" for="kLulusan">Lulusan SD lanjut ke SMP</span>
            <select class="form-control"  name="kLulusan">
              <option value="1" <?php echo ($_POST['kLulusan']==1)?'selected="selected"':''; ?> >100% dari jumlah siswa</option>
              <option value="2" <?php echo ($_POST['kLulusan']==2)?'selected="selected"':''; ?> >90% dari jumlah siswa</option>
              <option value="3" <?php echo ($_POST['kLulusan']==3)?'selected="selected"':''; ?> >80% dari jumlah siswa</option>
              <option value="4" <?php echo ($_POST['kLulusan']==4)?'selected="selected"':''; ?> >70% dari jumlah siswa</option>
              <option value="5" <?php echo ($_POST['kLulusan']==5)?'selected="selected"':''; ?> >60% dari jumlah siswa</option>
              <option value="6" <?php echo ($_POST['kLulusan']==6)?'selected="selected"':''; ?> >&lt;50% dari jumlah siswa</option>
            </select>
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon" for="kJumlah_Guru">Kriteria Jumlah Guru</span>
            <select class="form-control"  name="kJumlah_Guru">
              <option value="1" <?php echo ($_POST['kJumlah_Guru']==1)?'selected="selected"':''; ?> >100% Memenuhi</option>
              <option value="2" <?php echo ($_POST['kJumlah_Guru']==2)?'selected="selected"':''; ?> >90% Memenuhi</option>
              <option value="3" <?php echo ($_POST['kJumlah_Guru']==3)?'selected="selected"':''; ?> >80% Memenuhi</option>
              <option value="4" <?php echo ($_POST['kJumlah_Guru']==4)?'selected="selected"':''; ?> >70% Memenuhi</option>
              <option value="5" <?php echo ($_POST['kJumlah_Guru']==5)?'selected="selected"':''; ?> >60% Memenuhi</option>
              <option value="6" <?php echo ($_POST['kJumlah_Guru']==6)?'selected="selected"':''; ?> >&lt;50% Memenuhi</option>
            </select>
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon" for="kSarana">Sarana Sekolah</span>
            <select class="form-control"  name="kSarana">
              <option value="1" <?php echo ($_POST['kSarana']==1)?'selected="selected"':''; ?> >Sangat Baik</option>
              <option value="2" <?php echo ($_POST['kSarana']==2)?'selected="selected"':''; ?> >Baik</option>
              <option value="3" <?php echo ($_POST['kSarana']==3)?'selected="selected"':''; ?> >Sedang</option>
              <option value="4" <?php echo ($_POST['kSarana']==4)?'selected="selected"':''; ?> >Cukup</option>
              <option value="5" <?php echo ($_POST['kSarana']==5)?'selected="selected"':''; ?> >Kurang</option>
              <option value="6" <?php echo ($_POST['kSarana']==6)?'selected="selected"':''; ?> >Sangat Kurang</option>
            </select>
          </div>
          <br />
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