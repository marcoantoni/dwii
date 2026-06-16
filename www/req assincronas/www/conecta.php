<?php

	try{
		$conn = mysqli_connect("mysql", "root", "1234", "req_assincronas"); 

	} catch (mysqli_sql_exception $e){

		die("Erro ao conectar");
	}

?>