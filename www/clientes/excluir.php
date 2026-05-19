<?php
	
	$id_cliente = (int)$_GET["id"];

	require_once("../conecta.php");

	$sql = "DELETE FROM clientes WHERE id = $id_cliente";

	session_start();

	if (mysqli_query($conn, $sql) ){

		// Verifica quantos registros foram afetados pela exclusão
		// Se retornar 1, significa que um cliente foi excluído com sucesso

		if (mysqli_affected_rows($conn) == 1){
			$_SESSION["msg"] = "Cliente foi excluído com sucesso";
			$_SESSION["cor"] = "green";
		} else {
			$_SESSION["msg"] = "Nenhum cliente foi excluído";
			$_SESSION["cor"] = "red";
		}

	} else {
		// caso mysqli_query retorne false
		$_SESSION["msg"] = "Houve um erro ao tentar excluir o cliente";
		$_SESSION["cor"] = "red";
	}

	header("location: mostrar.php");

?>