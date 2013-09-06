<header id="fixed-header">
	<ul>
		<a href="/"><li>Home</li></a>
		<a href="/rules"><li>Rules</li></a>
		<a href="http://fluxus.in/"><li>Fluxus</li></a>
		<a href="/aboutus"><li>About us</li></a>
	</ul>
	<div id="account">
		<?php
		if($this->session->userdata('email')){
			//logged in
			$name = $this->session->userdata('name');
			$lq = $this->db->query('SELECT level from users WHERE id=?',array($this->session->userdata('id')));
			$level = $lq->row()->level;

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