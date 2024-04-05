<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="GET">
		Número: <input type="text" name="num">
		<input type="submit" name="enviar">
	</form>

	<?php
		if (isset($_GET['enviar']) ){

			if (empty($_GET['num']) )
				echo ("Preencha a variavel");
			else if (is_numeric($_GET['num'])){
				$numero = (int)$_GET['num'];

				if ($numero % 2 == 0)
					echo ("$numero é par");
				else 
					echo ("$numero é impar");
			}
		}
	?>

</body>
</html>