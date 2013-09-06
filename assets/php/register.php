<?php
include '../connect.inc.php';
$db = new PDO("mysql:host=$MySQLhost;dbname=$MySQLdbname;charset=utf8", 
			$MySQLuser, 
			$MySQLpass);
if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['pass2'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	if($name&&$email&&$pass&&$pass2){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$pquery = $db->prepare("SELECT id FROM users WHERE email=?");
			$pquery->execute(array($email));
			if(!$pquery->rowCount()){
				if($pass==$pass2){
					$query = $db->prepare("INSERT INTO users(name, pass, email, level) VALUES (?, ?, ?, 1)");
					$query->execute(array($name, $pass, $email));
					session_start();
					$_SESSION['id']=$db->lastInsertId();
					echo "Registration Successful.";
				}else{
					echo "Passwords don't match!";
				}
			}else{
				echo "Email already exists!";
			}
		}else{
			echo "Invalid Email.";
		}
	}else{
		echo "All details are neccessary.";
	}
}
?>