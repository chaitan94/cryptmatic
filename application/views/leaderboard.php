<!DOCTYPE html>
<html>
<head>
	<title>Cryptmatic</title>
	<link rel="stylesheet" href="assets/css/base.css">
	<link rel="stylesheet" href="assets/css/page.css">
</head>
<body>
<?php include 'assets/header.php'; ?>
<div class="cont">
<div class="card">
<table>
	<thead>
		<tr><th>Rank</th><th>Name</th><th>Level</th></tr>
	</thead>
	<tbody>
	<?php
	for ($i=0; $i < count($toppers); $i++) { 
		echo "<tr><td>".$toppers[$i]->rank."</td><td>".$toppers[$i]->name."</td><td>".$toppers[$i]->level."</td></tr>";
	}
	?>
	</tbody>
</table>
</div>
</div>
</body>
</html>