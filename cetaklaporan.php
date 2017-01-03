<?php session_start();
$_SESSION['user']=isset($_SESSION['user'])?$_SESSION['user']:'';

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'clustering';
// koneksi ke database
$connection = mysql_connect($db_host, $db_user, $db_pass) or die ("Koneksi gagal");
// Fungsi Untuk Memilih Database Yang Akan Di gunakan
$connectdb = mysql_select_db($db_name) or die (" Database tidak ditemukan ");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.ico">

    <title>Laporan SPM Sekolah</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body onload="window.print()">
    <?php

//cek jml sekolah
$jmlsekolah = mysql_num_rows(mysql_query("SELECT * FROM sekolah")) or 0;
echo '
<h1>Laporan SPM Sekolah</h1><br/>
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
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo DOMAIN; ?>js/jquery.min.js"></script>
    <script src="<?php echo DOMAIN; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo DOMAIN; ?>js/docs.min.js"></script>
  </body>
</html>
