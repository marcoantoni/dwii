<?php
	// aula7_criando_cookie.php
	
	// a função setcookie cria um cookie
	// recebe dois pametros: nome do cookie e a o valor
	setcookie("nome", "Lucas");

	setcookie("idade", 22);

	// definindo a validade de um cookie 10 segundos - 3º parametro é a validade do cookie
	// 30 dias seria: time()+60*60*24*30
	setcookie("peso", 65.8, time()+10);

	// 0 cookie expira ao fechar o navegador
	setcookie("altura", 1.75, 0);

	echo (time() );
?>