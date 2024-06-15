<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<?php
		$id_aluno = $_GET['id'];

		$conn = mysqli_connect("127.0.0.1", "root", "", "dwii");

		if ($conn) {
			$sql = "SELECT * FROM alunos WHERE id = $id_aluno";

			$resultado = mysqli_query($conn, $sql);

			if (mysqli_num_rows($resultado) == 1){
				$aluno = mysqli_fetch_array($resultado);

				$nome = $aluno["nome"];
				$nasc = $aluno["nascimento"];
				$email = $aluno["email"];
				$tel = $aluno["telefone"];
				$sexo = $aluno["sexo"];
				$id_curso = $aluno["id_curso"];	// necessário pegar o id_curso para poder selecionar o curso do usuário no select
			}
		} else {
			die("Houve um erro ao conectar com o banco de dados");
		}
	?>
	<form method="POST" action="atualizar.php">
		
		<div class="input-group">
			<label for="nome">Nome</label>
			<input type="text" name="nome" placeholder="Seu nome completo" value="<?php echo ($nome); ?>"> 
		</div>
		<div class="input-group">
			<label for="nome">Nascimento</label>
			<input type="date" name="nasc" placeholder="Sua data de nascimento" value="<?php echo ($nasc); ?>"> 
		</div>
		<div class="input-group">
			<label for="nome">E-mail</label>
			<input type="email" name="email" placeholder="Seu endereço de email" value="<?php echo ($email); ?>">
		</div>
		<div class="input-group">
			<label for="nome">Telefone</label>
			<input type="tel" name="tel" placeholder="Seu número de telefone" value="<?php echo ($tel); ?>">
		</div>
		<div class="radio-group">
			<label for="sexo">Sexo</label> <br>
			<input type="radio" name="sexo" value="1" <?php if ($sexo == 1) echo ("checked"); ?> <label for="feminino">Feminino</label> 
			<input type="radio" name="sexo" value="2" <?php if ($sexo == 2) echo ("checked"); ?>> <label for="masculino">Masculino</label> 
			<input type="radio" name="sexo" value="3" <?php if ($sexo == 3) echo ("checked"); ?> > <label for="intersexo">Intersexo</label>
		</div>
		Qual seu curso? 
		<div class="radio-group">
			<select name="curso">
				<?php
					// a edição é uma "cópia" da página de criação
					$conn = mysqli_connect("127.0.0.1", "root", "", "dwii");
					if ($conn){
						$sql = "SELECT * FROM cursos ORDER BY nome ASC";

						$registros = mysqli_query($conn, $sql);

						while ($registro = mysqli_fetch_array($registros)) {
							if ($registro["id"] == $id_curso)	// ao ir adicionando os options, verefica-se o id do curso do usuario $id_curso é igual a chave primária da tabela curso, nesse caso, seleciona-se a opção (selected)
								echo ("<option value='$registro[id]' selected> $registro[nome]  </option>");
							else
								// caso contrario, só adiciona a opção
								echo ("<option value='$registro[id]'> $registro[nome]  </option>");
						}
					}
				?>
			</select>
		</div>
		<br>
		Você confirma que as informações estão corretas?
		<input type="checkbox" name="termos"> Sim
		<!-- criando um campo oculto para enviar o id do aluno que está sendo editado -->
		<input type="hidden" name="id" value="<?php echo ($id_aluno); ?>">
		<!--<button>Cadastrar-se</button>-->
		<div class="input-group">
			<input type="submit" class="btn" name="enviar" value="Salvar"> 
		</div>
	
	</form>
</body>
</html>