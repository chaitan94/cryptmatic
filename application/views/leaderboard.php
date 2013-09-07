<!DOCTYPE html>
<html>
<head>
	<title>Cryptmatic</title>
	<link rel="stylesheet" href="/assets/css/base.css">
	<link rel="stylesheet" href="/assets/css/page.css">
</head>
<body>
<?php include '/assets/header.php'; ?>
<div class="cont">
<div class="card">
<table>
	<thead>
		<tr><th>Name</th><th>Level</th><th>Rank</th></tr>
	</thead>
	<tbody>
	<?php
	for ($i=0; $i < count($toppers); $i++) { 
		echo "<tr><td>".$toppers[$i]->name."</td><td>".$toppers[$i]->level."</td><td>".$toppers[$i]->rank."</td></tr>";
	}
	?>
	</tbody>
</table>
</div>
</div>
</body>
</html>