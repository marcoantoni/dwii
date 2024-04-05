<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="POST">
		Número 1: <input type="number" name="numero1"> <br>
		Número 2: <input type="number" name="numero2"> <br>
		<select name="op">
			<option value="+">Somar</option>
			<option value="-">Subtrair</option>
			<option value="*">Multiplicar</option>
			<option value="/">Dividir</option>
		</select>
		<input type="submit" name="enviar">
	</form>
	<?php
		if (isset($_POST['enviar'])){
			$num1 = $_POST['numero1'];
			$num2 = $_POST['numero2'];
			$operacao = $_POST['op'];

			if (!empty($num1) && !empty($num2)) {

				if (is_numeric($num1) && is_numeric($num2) ){
					$resultado = 0;	// inicializando a variavel

					if ($operacao == "+")
						$resultado = $num1 + $num2;
					else if ($operacao == "-")
						$resultado = $num1 - $num2;
					else if ($operacao == "*")
						$resultado = $num1 * $num2;
					else if ($operacao == "/")
						$resultado = $num1 / $num2;

					echo ("O resultado é $resultado");
				} else {
					echo ("Você está tentando fazer algo que não deve...");
				}
			} else {
				echo ("Preencha os dois numeros");
			}
		}
	?>
</body>
</html>