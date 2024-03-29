<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST">
		Nome: <input type="text" name="nome"> <br>
		Idade: <input type="number" name="idade"> <br>
		<input type="submit" name="enviar" value="Cadastrar-se">
	</form>

	<?php
		// testa se o usuario clicou no botão enviar
		if (isset($_POST["enviar"]) ) {
			echo ("Nome" . $_POST["nome"] . "<br>" );
			echo ("Idade" . $_POST["idade"] . "<br>" );
		} else {
			echo ("Não clicou no botão de enviar");
		}
	?>
</body>
</html>
