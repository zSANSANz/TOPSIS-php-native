        <h1 class="page-header">Dashboard</h1>
        
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <h4 class="text-muted">Sekolah</h4>
              <?php $jmlsekolah = mysql_num_rows(mysql_query("SELECT * FROM sekolah")) or 0;
              echo '<h1 style="font-size:58px">'.$jmlsekolah.'</h1>';
              ?>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h4 class="text-muted">Guru</h4>
              <?php $query = mysql_query("SELECT SUM(Jumlah_Guru) as jml FROM sekolah");
              if ($guru = mysql_fetch_object($query)) {
                $jmlguru = $guru->jml;
              } else {
                $jmlguru = 0;
              }
              echo '<h1 style="font-size:58px">'.$jmlguru.'</h1>';
              ?>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h4 class="text-muted">Sekolah SPM</h4>
              <?php $jmlsekolah = mysql_num_rows(mysql_query("SELECT * FROM sekolah WHERE Dc1<Dc2")) or 0;
              echo '<h1 style="font-size:58px">'.$jmlsekolah.'</h1>';
              ?>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <h4 class="text-muted">Sekolah Non SPM</h4>
              <?php $jmlsekolah = mysql_num_rows(mysql_query("SELECT * FROM sekolah WHERE Dc1>Dc2")) or 0;
              echo '<h1 style="font-size:58px">'.$jmlsekolah.'</h1>';
              ?>
            </div>
          </div>