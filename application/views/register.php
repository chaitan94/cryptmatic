<!DOCTYPE html>
<html>
<head>
	<title>Cryptmatic</title>
	<link rel="stylesheet" href="assets/css/base.css">
	<link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(isset($_SESSION['id'])){
?>
<script type="text/javascript">window.open('/','_self');</script>
<?php
}else{
include 'assets/header.php'; ?>
<div class="cont">
<div class="sign">
<table id="register" class="card">
<form action="/register/newAcc" method="post">
	<tbody>
	<tr><td colspan="2"><center>Register youself to start hunting!</center></td></tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="regName" placeholder="Your name"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="regMail" placeholder="mygmail@gmail.com"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="regPass"></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" name="regPass2"></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" value="Register"></center></td>
		</tr>
	</tbody>
</form>
</table>
<form action="/login/process" method="post">
<table id="login" class="card">
	<tbody>
	<tr><td colspan="2"><center>Login</center></td></tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="logMail" placeholder="mygmail@gmail.com"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="logPass"></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" value="Login"></center></td>
		</tr>
		<tr>
			<td colspan="2"><center><div id="logMsg"></div></center></td>
		</tr>
	</tbody>
</table>
</form>
</div>
</div>
<?php 
}
?>
</body>
</html>