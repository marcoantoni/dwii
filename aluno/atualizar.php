<?php

	$nome = $_POST["nome"];
	$nascimento = $_POST["nasc"];
	$telefone = $_POST["tel"];
	$sexo = $_POST["sexo"];
	$curso = $_POST["curso"];
	$email = $_POST["email"];
	$id = $_POST["id"];

	$erros = [];

	if (empty($nome) ){
		$erros[] = "Nome está vazio";
	}

	if (empty($nascimento) ){
		$erros[] = "O nascimento está vazio";
	}

	if (empty($telefone)){
		$erros[] = "O telefone está vazio";
	}

	if (empty($sexo) ){
		$erros[] = "Preencha o campo sexo";
	}

	if (empty($curso) ){
		$erros[] = "Preencha o curso";
	}

	if (empty($email) ){
		$erros[] = "Preencha o email corretamente";
	}

	if (count($erros) > 0) {
		echo ("Houve um erro: Verifique as mensagens abaixo");
		foreach ($erros as $erro) {
			echo ("$erro <br>");
		}
	} else {
		// se cair  aqui é por que tudo preenchido corretamente
		
		// abre a conexão com o banco de dados mysql
		// endereco ip do servidor mysql, usuario, senha, nome da base
		$conn = mysqli_connect("localhost", "root", "", "dwii");

		if ($conn){
			// conexão com o banco com sucesso

			// monta a instrução sql a ser executada
			$sql = "UPDATE alunos SET nome = '$nome', nascimento = '$nascimento', email = '$email', telefone = '$telefone', sexo = $sexo, curso = '$curso' WHERE id = $id ";

			// mysqli_query executa a consulta sql
			// se retornar true, a consulta foi executada com sucesso. Em caso de falha, retorna false
			if (mysqli_query($conn, $sql) ){
				echo ("Aluno alterado com sucesso");
			} else {
				echo ("Houve um erro ao inserir o registro: <br> $sql");
			}

			// encerra a conexão com o banco de dados
			mysqli_close($conn);
		} else {
			// erro ao conectar com o bd
			die("Erro ao conectar com o banco de dados");
		}

	}
?>