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
			$this->load->database();
			$tq = $this->db->query('SELECT level FROM users WHERE id='.$_SESSION['id'].' LIMIT 1');
			$result = $tq->row_array();
			$name = $result['name'];
			$level = $result['level'];
			echo '<ul>';
			echo '<a href="/level/'.$level.'"><li>Level: '.$level.'</li></a>';
			echo '<a href="/profile"><li>'.$name.'</li></a>';
			echo '<a href="/logout"><li>Logout</li></a></ul>';
		} else {
			//not logged in
			echo '<ul><a href="/register"><li>Login/Register</li></a></ul>';
		}
		?>
	</div>
</header>