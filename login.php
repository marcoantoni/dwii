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
		<?php
			if (isset($_POST["enviar"])){
				// clicou no botão enviar

				// armazena os inputs em variaveis para não precisar escrever $_POST["variavel"] várias vezes
				$usuario = $_POST["usuario"];
				$senha = $_POST["senha"];

				if (!empty($usuario) && !empty($senha)){
					// aqui dentro fica a lógica de fazer o login

					if ($usuario == "admin" && $senha == "1234"){
						// acertou o usuario e senha (login ok)
						session_start();	// inicia a sessão
						$_SESSION["usuario"] = "admin";		// cria a variavel de sessão que será usada para validar se o usuário está logada
						header("location: inicio.php"); 	// redireciona para a pagina inicio.php
					} else {
						echo ("Usuário ou senha incorretos");
					}

				} else {
					echo ("Preencha o usuário e a senha corretamente");
				}
			}
		?>
	</div>
</body>
</html>