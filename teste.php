<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST">
		Nome: <input type="text" name="nome">
		<input type="submit" name="enviar">
		Idade: <input type="number" name="idade">
	</form>

	<?php
		if (isset($_POST['enviar']) ){
			$erros = [];

			if (empty($_POST['nome']) ){
				$erros[] = "Preencha o nome";
			} 

			if (empty($_POST['idade'])) {
				$erros[] = "Preencha a idade";
			}
			
			print_r($erros);
			if (count($erros) > 0){
				foreach ($erros as $erro) {
					echo ("<br><b>$erro</b><br>");
				}
			} else {
				$nome = $_POST["nome"];
				$idade = $_POST["idade"];

				echo ("Tudo certo com os dados");
				echo ("Nome: $nome");
				echo ("Idade: $idade");

			}
			
		}
	?>
</body>
</html>