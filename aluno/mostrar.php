<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mostrando os alunos cadastrados</title>
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	<h1>Mostrando os alunos cadastrados</h1>
	<?php
		// abre a conexão com o bd
		$conn = mysqli_connect("127.0.0.1", "root", "", "dwii");

		// conexão bem sucedida
		if ($conn) {
			$sql = "SELECT id, nome, DATE_FORMAT(nascimento, '%d/%m/%Y') AS nascimento, email, telefone, sexo, curso FROM alunos;";	// consulta para buscar todos os dados da tabela

			// como a consulta é do tipo select, se for executada com sucesso, irá retornar um resultset
			$resultado = mysqli_query($conn, $sql);

			// mysqli_num_rows() conta as linhas de um resultset passado como parametro
			// se a consulta retornar mais que 0 linhas, deve ser mostrado os dados
			if (mysqli_num_rows($resultado) > 0){
				// cabecalho da tabela
				// \" é o caractere de escape para a saída de ". Poderia ser utilizada a 
				echo ("<table>
					<thead>
						<tr>
							<th>Nome</th>
							<th>Nascimento</th>
							<th>Sexo</th>
							<th>Curso</th>
							<th>E-mail</th>
							<th>Telefone</th>
							<th colspan=\"2\">Opções</th>
						</tr>
					</thead>
					<tbody>
				");

				/* percorrendo o resultset. A funcao mysqli_fetch_array irá retornar linha por linha do resultset e armazenar dentro de $row.
				A variavel $row é um array associativo, cujas as chaves são os nomes das colunas do banco de dados
				*/
				while($row = mysqli_fetch_array($resultado) ){
					// abre uma nova linha a adiciona os dados dentro de cada coluna
					echo ("<tr>");
					echo ("<td>$row[nome]");
					echo ("<td>$row[nascimento]");
					echo ("<td>$row[sexo]");
					echo ("<td>$row[curso]");
					echo ("<td>$row[email]");
					echo ("<td>$row[telefone]");
					echo ("<td>
						<a href=\"#\" class=\"edit_btn\">Editar</a>
						<a href=\"#\" class=\"del_btn\">Excluir</a>
					</td>");
					echo ("</tr>");
				}
				// apos adicionar os dados, é necessário fechar a tabela
				echo ("</tbody></table>");
			} else {
				echo ("Não há nada a ser mostrado");
			}
		} else {
			die("Houve um erro ao conectar com o banco de dados");
		}
	?>
</body>
</html>