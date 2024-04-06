<?php
	// sair.php

	session_start();	// inicia a sessão

	session_destroy();	// encerra a sessão

	header("location: login.php"); // redireciona para login.php
?>