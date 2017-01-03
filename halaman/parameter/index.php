<?php
// fungsi untuk mengubah kriteria ke nilai
function ktn($kriteria){
	$nilai = 0;
	if ($kriteria==1) {
		$nilai = 80;
	} else if ($kriteria==2) {
		$nilai = 70;
	} else if ($kriteria==3) {
		$nilai = 60;
	} else if ($kriteria==4) {
		$nilai = 50;
	} else if ($kriteria==5) {
		$nilai = 40;
	} else if ($kriteria==6) {
		$nilai = 30;
	}
	return $nilai;
}

$uri[1] = ($uri[1]!='')?$uri[1]:'index';
if (is_file(HALAMAN.$uri[0].'/'.$uri[1].'/index.php')) {
  require_once(HALAMAN.$uri[0].'/'.$uri[1].'/index.php');
} else {
  require_once('404.php');
}
?>