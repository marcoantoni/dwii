<?php
	// arquivo escape_caracter.php
	
	// variáveis utilizadas para simular os dados recebidos
	// em um formulário de login
	$usuario = "admin";
	$senha = "f6sd8gfd5u'n4r";

	// inclui o arquivo responsável pela conexão com o banco
	include ("conecta.php");

	// aplica escape nos caracteres especiais da variável $usuario
	// isso evita que caracteres especiais quebrem a consulta SQL
	$usuario_escape = mysqli_real_escape_string($conn, $usuario);

	// aplica escape nos caracteres especiais da variável $senha
	// neste exemplo, o caractere aspas simples (') será tratado corretamente
	$senha_escape = mysqli_real_escape_string($conn, $senha);

	// exibe o valor original e o valor após o escape
	echo ("Usuario sem escape: $usuario - usuario com escape: $usuario_escape <br>");

	// exibe o valor original e o valor após o escape
	echo ("Senha sem escape: $senha - senha com escape: $senha_escape <br>");

	// monta a consulta SQL utilizando os valores tratados
	// a intenção deste exemplo é mostrar que a consulta continua válida
	// mesmo contendo caracteres especiais
	echo $sql = "SELECT * FROM usuarios WHERE usuario='$usuario_escape' AND senha='$senha_escape' ";

?>
