<?php
include '../connect.inc.php';
$db = new PDO("mysql:host=$MySQLhost;dbname=$MySQLdbname;charset=utf8", 
			$MySQLuser, 
			$MySQLpass);
if(isset($_POST['email'])&&isset($_POST['pass'])){
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	if($email&&$pass){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$pquery = $db->prepare("SELECT id, pass FROM users WHERE email=?");
			$pquery->execute(array($email));
			if($pquery->rowCount()){
				$res = $pquery->fetch(PDO::FETCH_ASSOC);
				if($res['pass']==$pass){
					session_start();
					$_SESSION['id']=$res['id'];
					echo "<script>location.reload();</script>";
				}else{
					echo 'Password wrong. Try again.';
				}
			}else{
				echo 'Email not registered.';
			}
		}else{
			echo "Invalid Email.";
		}
	}else{
		echo "All details are neccessary.";
	}
}
?>