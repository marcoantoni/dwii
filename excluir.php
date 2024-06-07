<?php
	
	// ajuste os parametros conforme o seu usuário, senha e banco de dados
	$conn = mysqli_connect("127.0.0.1", "root", "", "dwii");

	// conexão bem sucedida
	if ($conn) {
		$id_usuario = (int) $_GET['id'];
		
		$sql = "DELETE FROM alunos WHERE id = $id_usuario";	

	
		if (mysqli_query($conn, $sql) ){
			echo ("Aluno excluido com sucesso");
		} else {
			echo ("Houve um erro ao excluir o registro: <br> $sql");
		}
	}

	mysqli_close($conn);

		