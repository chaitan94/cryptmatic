<!DOCTYPE html>
<html>
<head>
	<title>Cryptmatic</title>
	<link rel="stylesheet" href="assets/css/base.css">
	<link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
<?php
session_start();
if(isset($_SESSION['id'])){
	unset($_SESSION['id']);
} ?>
<script type="text/javascript">window.open('/','_self');</script>
</body>
</html>