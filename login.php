<?php include('connect.php') ?>
<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login to UDBMS</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
	body{
		background-image: url('assets/bg.jpg');
		height: 100vh;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		background-color: rgba(0,0,0,.5);
		background-blend-mode: multiply;
	}
</style>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="login.php">Contact the Database Administrator</a>
  	</p>
  </form>
</body>
</html>