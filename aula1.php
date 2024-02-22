<?php
	// isso é um comentário

	/* isso inicia um comentário de mais de uma
	   linha
	*/

	# isso também um comentário
	
	$nome = 10;

	$nome = "Marco"; // string

	$idade = 18;	// int

	$numero = 28.1;	// float

	$boolean = false;	// variavel booleana

	$nome .= " Antoni"; // concatenando uma string a uma variavel existente

	echo ("Nome: <b> $nome </b> <br>"); // printando algo na tela, combinando uma mensagem com o conteudo da variavel

	// estrutura de decisão
	if ($idade >= 18){
		echo ("É maior de idade");
	} else {
		echo ("É menor de idade");
	}

	// exemplo de if com mais de uma condição
	echo ("<br>");
	$sexo = 'm';

	if ($sexo == 'm')
		echo ("Sexo: <b>masculino</b>");
	else if ($sexo == 'f')
		echo ("Sexo: <b>feminino</b>");
	else 
		echo ("Sexo: <b>intersexo</b>");

	// exemplo de if aninhado
	$passou_no_teste = true; //

	iF ($idade >= 18 && $passou_no_teste)
		ECHO ("Apto a tirar a CNH");
	else 
		ecHo ("Não apto a tirar a CNH");

	$Nome = "teste";

	echo ("$Nome");
?>