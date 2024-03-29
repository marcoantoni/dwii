<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="GET" action="processa.php">
		<fieldset>
		<legend>Cadastro de usuário</legend>
		Nome: <input type="text" name="nome"> <br>
		Nascimento: <input type="date" name="nasc"> <br>
		E-mail: <input type="email" name="email"> <br>
		Telefone: <input type="tel" name="tel"><br>
		Sexo: <input type="radio" name="sexo" value="m"> Masculino 
		<input type="radio" name="sexo" value="f" checked> Feminino 
		<input type="radio" name="sexo" value="i"> Intersexo <br>
		Onde você estuda: 
		<select name="escola">
			<option>Instituto Federal do Rio do Grande do Sul</option>
			<option>Escola Frei Miguelinho</option>
			<option>Escola Souza Cruz</option>
		</select> <br>
		Senha: <input type="password" name="senha"> <br>
		Repita a senha: <input type="password" name="senha2"><br>
		<br>
		Aceita os termos de cadastro?
		<input type="checkbox" name="termos">
		<button>Cadastrar-se</button>
		</fieldset>
	</form>
</body>
</html>