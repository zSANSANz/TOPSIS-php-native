<?php
$uri[1] = ($uri[1]!='')?$uri[1]:'index';
if (is_file(HALAMAN.$uri[0].'/'.$uri[1].'/index.php')) {
  require_once(HALAMAN.$uri[0].'/'.$uri[1].'/index.php');
} else {
  require_once('404.php');
}
?>