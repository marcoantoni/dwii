<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<form method="GET" action="processa.php">
		
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
			<input type="radio" name="sexo" value="f"> <label for="feminino">Feminino</label> 
			<input type="radio" name="sexo" value="m"> <label for="masculino">Masculino</label> 
			<input type="radio" name="sexo" value="i"> <label for="intersexo">Intersexo</label>
		</div>
		Qual seu curso? 
		<div class="radio-group">
			<select name="curso">
				<option>Análise e Desenvolvimento de Sistemas</option>
				<option>Tecnologia em Processos Gerenciais</option>
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
