<header id="fixed-header">
	<ul>
		<a href="/"><li>Home</li></a>
		<a href="/rules"><li>Rules</li></a>
		<a href="http://fluxus.in/"><li>Fluxus</li></a>
		<a href="/aboutus"><li>About us</li></a>
	</ul>
	<div id="account">
		<?php
		session_start();
		if(isset($_SESSION['id'])){
			//logged in
			include 'connect.inc.php';
			$db = new PDO("mysql:host=$MySQLhost;dbname=$MySQLdbname;charset=utf8", 
				$MySQLuser, 
				$MySQLpass);
			$tq = $db->prepare('SELECT name,level FROM users WHERE id=?');
			$tq->execute(array($_SESSION['id']));
			$result = $tq->fetch(PDO::FETCH_ASSOC);
			$name = $result['name'];
			$level = $result['level'];
			echo '<ul>';
			echo '<a href="/level"><li>Level: '.$level.'</li></a>';
			echo '<a href="/profile"><li>'.$name.'</li></a>';
			echo '<a href="/logout"><li>Logout</li></a></ul>';
		} else {
			//not logged in
			echo '<ul><a href="/register"><li>Login/Register</li></a></ul>';
		}
		?>
	</div>
</header>