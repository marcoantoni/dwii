<?php
	$method = $_SERVER['REQUEST_METHOD'];

	// Inicializa as variáveis como vazias
	$uf = '';
	$cidade = '';

	// Verifica se os dados foram enviados via POST ou GET
	if ($method === 'POST') {
	    $uf = $_POST["estado"] ?? '';
	    $cidade = $_POST["cidade"] ?? '';
	} else if ($method === 'GET') {
	    $uf = $_GET["estado"] ?? '';
	    $cidade = $_GET["cidade"] ?? '';
	}

	// Exibe as informações
	echo "<p>Os dados foram enviados via <b>$method</b></p>";
	echo "<p>O usuário escolheu o estado de <b>$uf</b> e a cidade de <b>$cidade</b>.<p>";
	echo "<p>Embora tenha escolhido a cidade pelo nome, na hora de salvar no banco de dados será inserido o código da mesma, pois bancos de dados relacionais utilizam os conceitos de <b>chave primária</b> (primary key) e <b>chave estrangeira</b> (foreign key).</p>";
?>
