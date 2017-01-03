<?php
if ($_SESSION['user']!='') {
	echo '<script>document.location.href="'.DOMAIN.'";</script>';
}
?>
	<div class="col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4" style="background:#fff;margin-top:50px;padding-bottom:20px;">
	<div class="row placeholder">
	<h1 class="page-header">Form Login</h1>
<?php
$_POST['username'] = isset($_POST['username'])?$_POST['username']:'';
$_POST['password'] = isset($_POST['password'])?$_POST['password']:'';
if (isset($_POST['loginbtn'])){
	$user_sql = mysql_query("SELECT * FROM user WHERE Username='".$_POST['username']."' AND Password='".md5($_POST['password'])."'");
	if ($user=mysql_fetch_object($user_sql)){
		$_SESSION['user'] 		= $user->Username;
		$_SESSION['namauser'] 	= $user->Nama;
		echo '<script>document.location.href="'.DOMAIN.'";</script>';
	} else {
		echo '<div class="alert alert-danger">
        <strong>Gagal Login</strong><br/>Username atau Password anda salah.
      </div>';
	}
}
?>

		<form class="form-signin" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" role="form">
     		<input type="text" name="username" class="form-control" placeholder="Username" required autofocus value="<?php echo $_POST['username']; ?>">
     		<input type="password" name="password" class="form-control" placeholder="Password" required value="<?php echo $_POST['password']; ?>">
        	<button class="btn btn-lg btn-primary btn-block" type="submit" name="loginbtn">Log in</button>
      	</form>
      	</div>
	</div>