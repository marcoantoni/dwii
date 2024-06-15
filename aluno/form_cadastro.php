<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<form method="POST" action="salvar.php">
		
		<div class="input-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" placeholder="Seu nome completo"> 
		</div>
		<div class="input-group">
			<label for="nome">Nascimento</label>
			<input type="date" name="nasc" placeholder="Sua data de nascimento"> 
		</div>
		<div class="input-group">
			<label for="nome">E-mail</label>
			<input type="email" name="email" placeholder="Seu endereço de email">
		</div>
		<div class="input-group">
			<label for="nome">Telefone</label>
			<input type="tel" name="tel" placeholder="Seu número de telefone">
		</div>
		<div class="radio-group">
			<label for="sexo">Sexo</label> <br>
			<input type="radio" name="sexo" value="1"> <label for="feminino">Feminino</label> 
			<input type="radio" name="sexo" value="2"> <label for="masculino">Masculino</label> 
			<input type="radio" name="sexo" value="3"> <label for="intersexo">Intersexo</label>
		</div>
		Qual seu curso? 
		<div class="radio-group">
			<select name="curso">
				<option selected>Escolha o curso</option>
				<?php
					// para criar o select dinâmico, é necessário fazer uma consutla na tabela que contém as informações
					$conn = mysqli_connect("127.0.0.1", "root", "", "dwii");
					if ($conn){
						$sql = "SELECT * FROM cursos ORDER BY nome ASC";	// consulta SQL a ser executada

						$registros = mysqli_query($conn, $sql);

						while ($registro = mysqli_fetch_array($registros)) {	// percorrendo o result set
							echo ("<option value='$registro[id]'> $registro[nome]  </option>");	// adiciona os elementos option do select
						}
					}
				?>
			</select>
		</div>
		<br>
		Você confirma que as informações estão corretas?
		<input type="checkbox" name="termos"> Sim
		<!--<button>Cadastrar-se</button>-->
		<div class="input-group">
			<input type="submit" class="btn" name="enviar" value="Salvar"> 
		</div>
	
	</form>
</body>
</html>