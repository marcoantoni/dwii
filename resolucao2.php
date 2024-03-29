<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
		$frutas = ["morango", "maça", "pera", "uva", "Banana"];
	?>

	<ol>
	<?php
		foreach ($frutas as $fruta){
			echo ("<li>$fruta </li>");
		}
	?>
	</ol>
</body>
</html>
