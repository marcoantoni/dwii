<?php
	echo ("Algoritmos suportados<br>");
	
	print_r(hash_algos());

	$senha = "churrasco";

	echo ("Hash MD5 da senha $senha é " . md5($senha) . "<br>");

	$salt = "978fdn$#*";

	echo ("Hash MD5 da senha com salt é $salt$senha é " . md5($salt . $senha) . "<br>");

	// exemplo de uso da função password_hash com o algoritmo bcrypt
	// gerando um hash com custo 10 -> valor padrão, portanto, pode ser omitido

	echo ("Exemplo de uso bcrypt para a senha $senha<br>");
	
	echo password_hash("$senha", PASSWORD_BCRYPT, ["cost" => 10]);

	// hash gerado a partir da senha 123456 - slide
	$hash = '$2y$10$aMMVA./jJCjLK3vjTQRbfep3dCqTUEhizJ7hy0iENVUmhDRHO3OU6';

	// comparando a senha original com o hash
	if(password_verify("1234", $hash)) {
		echo "Senha correta";
	} else {
		echo "Senha incorreta";
	}


?>