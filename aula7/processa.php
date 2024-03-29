<?php
	// processa.php
	echo ("esse é o arquivo processa.php");

	$nome = $_GET["nome"];
	$nascimento = $_GET["nasc"];
	$telefone = $_GET["tel"];
	$sexo = $_GET["sexo"];
	$escola = $_GET["escola"];
	$senha = $_GET["senha"];
	$senha2 = $_GET["senha2"];
	$email = $_GET["email"];

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

	if (empty($escola) ){
		$erros[] = "Preencha a escola";
	}

	if (empty($email) ){
		$erros[] = "Preencha o email corretamente";
	}

	if (empty($senha) ) {
		$erros[] = "Preencha o campo senha";
	} else {
		if ($senha != $senha2){
			$erros[] = "Verifique se as senhas digitadas são iguais";
		}
	}

	if (count($erros) > 0) {
		echo ("Houve um erro: Verifique as mensagens abaixo");
		foreach ($erros as $erro) {
			echo ("$erro <br>");
		}
	} else {
		// se cair  aqui é por que tudo preenchido corretamente
		echo ("Dados recebidos na página<br>");
		echo ("Nome: $nome <br>");
		echo ("nascimento: $nascimento <br>");
		echo ("Email: $email <br>");
		echo ("Telefone: $telefone <br>");
		echo ("Sexo: $sexo <br>");
		echo ("Onde estuda: $escola <br>");
		echo ("Senha: $senha <br>");
	}
?>
