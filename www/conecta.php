<?php
	// --------------------------------------------
		// CONEXÃO COM O BANCO DE DADOS
		// --------------------------------------------
		// arquivo "conecta.php". Este arquivo deverá ser utilizado em todos os arquivos que fazem alguma operação no banco de dados
		// Aqui iniciamos a comunicação com o MySQL
		// Abre a conexão com o banco de dados MySQL, informando:
		// o servidor ("mysql"), que pode ser o NOME DO SERVIÇO (no Docker)
		//   ou o ENDEREÇO IP do servidor onde o banco está rodando
		// - o usuário (root)
		// - a senha (12345)
		// - e o nome do banco (des_web)
		
		try{
			$conn = mysqli_connect("mysql", "root", "1234", "des_web"); 
		} catch (mysqli_sql_exception $e){
			die("Erro ao conectar");

		}
?>