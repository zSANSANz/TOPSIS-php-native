<?php session_start();
$_SESSION['user']=isset($_SESSION['user'])?$_SESSION['user']:'';
// Deklarasi variabel yang dibutuhkan
define('DOMAIN', 'http://' . $_SERVER['HTTP_HOST'].'/clustering/'); // domain
define('ROOT', dirname(realpath(__FILE__)).'/');
define('HALAMAN', ROOT.'halaman/');

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
    <link rel="shortcut icon" href="<?php echo DOMAIN; ?>images/favicon.ico">

    <title>SPK Klasifikasi Sekolah Berdasarkan SPM dengan Metode K-Means Clustering</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo DOMAIN; ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="<?php echo DOMAIN; ?>images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo DOMAIN; ?>images/logo.png" type="image/x-icon" />

    <!-- Custom styles for this template -->
    <link href="<?php echo DOMAIN; ?>css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
<?php
// fungsi utuk memecah uri di address bar dan memasukkannya ke array
require_once ("uri.php");
$uri = uri();
$uri[0] = ($uri[0]!='')?$uri[0]:'index';
$uri[1] = isset($uri[1])?$uri[1]:'';
// cek halaman aktif
function cekhalamanaktif($link,$halaman) {
	$out=($link==$halaman)?'<li class="active">':'<li>';
	echo $out;
}
?>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo DOMAIN; ?>"><img width="20px" height="20px" src="<?php echo DOMAIN; ?>images/logo.png" > SPK Klasifikasi Sekolah Berdasarkan SPM</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <?php cekhalamanaktif($uri[0],'index'); ?><a href="<?php echo DOMAIN; ?>">Dashboard</a></li>
          <?php
          	if ($_SESSION['user']=='') {
          ?>
            <?php cekhalamanaktif($uri[0],'login'); ?><a href="<?php echo DOMAIN; ?>login">Masuk</a></li>
          <?php
          	} else {
          ?>
          <?php cekhalamanaktif($uri[0],'sekolah'); ?><a href="<?php echo DOMAIN; ?>sekolah">Data Sekolah</a></li>
          <?php cekhalamanaktif($uri[0],'parameter'); ?><a href="<?php echo DOMAIN; ?>parameter">Parameter Kriteria</a></li>
          <?php cekhalamanaktif($uri[0],'laporan'); ?><a href="<?php echo DOMAIN; ?>laporan">Laporan SPM</a></li>
          <?php cekhalamanaktif($uri[0],'keluar'); ?><a href="<?php echo DOMAIN; ?>keluar">Keluar</a></li>
          <?php } ?>
          </ul>
          <!--
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
          -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <?php cekhalamanaktif($uri[0],'index'); ?><a href="<?php echo DOMAIN; ?>">Dashboard</a></li>
          </ul>
<?php
if ($_SESSION['user']!='') {
	if ($uri[0]=='index') { ?>
          <ul class="nav nav-sidebar">
          	<?php cekhalamanaktif($uri[0],'sekolah'); ?><a href="<?php echo DOMAIN; ?>sekolah">Data Sekolah</a></li>
          	<?php cekhalamanaktif($uri[0],'parameter'); ?><a href="<?php echo DOMAIN; ?>parameter">Parameter Kriteria</a></li>
          	<?php cekhalamanaktif($uri[0],'laporan'); ?><a href="<?php echo DOMAIN; ?>laporan">Laporan SPM</a></li>
          </ul>
    <?php } else if ($uri[0]=='sekolah') { ?>
    	  <ul class="nav nav-sidebar">
    		<?php cekhalamanaktif($uri[1],''); ?><a href="<?php echo DOMAIN; ?>sekolah">Data Sekolah</a></li>
          	<?php cekhalamanaktif($uri[1],'tambahdata'); ?><a href="<?php echo DOMAIN; ?>sekolah/tambahdata">Tambah Data</a></li>
          </ul>
    <?php } else if ($uri[0]=='parameter') { ?>
    	  <ul class="nav nav-sidebar">
    		<?php cekhalamanaktif($uri[1],''); ?><a href="<?php echo DOMAIN; ?>parameter">Data Parameter</a></li>
          	<?php cekhalamanaktif($uri[1],'clustering'); ?><a href="<?php echo DOMAIN; ?>parameter/clustering">Clustering</a></li>
          </ul>
	<?php } else if ($uri[0]=='laporan') { ?>
    	  <ul class="nav nav-sidebar">
    		<?php cekhalamanaktif($uri[1],''); ?><a href="<?php echo DOMAIN; ?>laporan">Laporan SPM</a></li>
          </ul>
	<?php }

} else {
	$akses = ($uri[0]=='sekolah') || ($uri[0]=='parameter') || ($uri[0]=='laporan');
	$uri[0] = ($akses)?'notfound':$uri[0];
} ?>
		</div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<?php
if (is_file(HALAMAN.$uri[0].'/index.php')) {
	require_once(HALAMAN.$uri[0].'/index.php');
} else {
	require_once('404.php');
}
?>
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo DOMAIN; ?>js/jquery.min.js"></script>
    <script src="<?php echo DOMAIN; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo DOMAIN; ?>js/docs.min.js"></script>
  </body>
</html>
