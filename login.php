<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página de login</title>
	<link rel="stylesheet" href="css\login.css">
</head>
<body>
	<div id="login">
		<form method="POST" class="card">
			<div class="card-header">
				<h2>Login</h2>
			</div>
			<div class="card-content">
				<div class="card-content-area">
					<label for="usuario">Usuário</label>
					<input type="text" id="usuario" name="usuario" autocomplete="off">
				</div>
				<div class="card-content-area">
					<label for="senha">Senha</label>
					<input type="password" id="password" name="senha" autocomplete="off">
				</div>
			</div>
			<div class="card-footer">
				<input type="submit" value="login" class="submit" name="enviar">
				<a href="#" class="recuperar_senha">Esqueci minha senha</a>
			</div>
		</form>
	</div>
</body>
</html>