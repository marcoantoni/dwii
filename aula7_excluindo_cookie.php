<?php
	// aula7_excluindo_cookie.php

	// basta definir a validade com um valor expirado
	setcookie("nome", "", time()-1);
	setcookie("idade", "", time()-1);
	setcookie("altura", "", time()-1);
	setcookie("peso", "", time()-1);
?>