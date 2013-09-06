<!DOCTYPE html>
<html>
<head>
	<title>Cryptmatic</title>
	<link rel="stylesheet" href="/assets/css/base.css">
	<link rel="stylesheet" href="/assets/css/register.css">
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
include '/assets/header.php'; ?>
<div class="cont">
<div class="sign">
<table id="register" class="card">
	<tbody>
	<tr><td colspan="2"><center>Register youself to start hunting!</center></td></tr>
		<tr>
			<td>Name</td>
			<td><input type="text" id="regName" placeholder="Your name"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" id="regMail" placeholder="mygmail@gmail.com"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" id="regPass"></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" id="regPass2"></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" id="regSubmit" value="Register"></center></td>
		</tr>
	</tbody>
</table>
<table id="login" class="card">
	<tbody>
	<tr><td colspan="2"><center>Login</center></td></tr>
		<tr>
			<td>Email</td>
			<td><input type="email" id="logMail" placeholder="mygmail@gmail.com"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" id="logPass"></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" id="logSubmit" value="Login"></center></td>
		</tr>
		<tr>
			<td colspan="2"><center><div id="logMsg"></div></center></td>
		</tr>
	</tbody>
</table>
</div>
</div>
<script type="text/javascript" src="assets/js/vendor/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="assets/js/register.js"></script>
<?php 
}
?>
</body>
</html>