<?php
	session_start();

	if (!isset($_SESSION["usuario"]) )
		header("location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<h1>Bem vindo a página principal</h1>

	<a href="sair.php">Sair</a>
</body>
</html>