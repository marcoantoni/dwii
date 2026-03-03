<?php
	// aula1_correcao_ex_decisao.php
	
	// Faça um programa que calcula e mostre o percentual de frequência de um estudante. Para isso, considere que 120 períodos correspondem a 100% da carga horária.

	$total = 120;
	$presencas = 105;

	$frequencia = ($presencas / $total) * 100;

	echo ("O aluno tem $frequencia por cento de frequencia nas aulas");

	//Escreva um programa que verifica se um número é par ou ímpar.
	$numero = -4;

	if ($numero % 2 == 0)
		echo ("O número $numero é par <br>");
	else
		echo ("O número $numero é ímpar <br>");

	//Crie um programa que verifica se um número inteiro é positivo, negativo ou zero.
	if ($numero < 0)
		echo ("O número $numero é negativo <br>");
	else if ($numero > 0)
		echo ("O número $numero é positivo <br>");
	else
		echo ("O número é zero <br>");

	//Faça um programa que escreve uma data por extenso, lendo os dados de três variáveis (representando uma data). Exemplo: 15/03/2023 → 15 de março de 2023.

	$dia = 3;
	$mes = 3;
	$ano = 2026;

	// iniciando a saida com o dia e a preposição de
	$saida = $dia . " de ";

	if ($mes == 1)
		$saida .= "janeiro";
	else if ($mes == 2)
		$saida .= "fevereiro";
	else if ($mes == 3)
		$saida .= "março";
	else if ($mes == 4)
		$saida .= "abril";
	else if ($mes == 5)
		$saida .= "maio";
	else if ($mes == 6)
		$saida .= "junho";
	else if ($mes == 7)
		$saida .= "julho";
	else if ($mes == 8)
		$saida .= "agosto";
	else if ($mes == 9)
		$saida .= "setembro";
	else if ($mes == 10)
		$saida .= "outubro";
	else if ($mes == 11)
		$saida .= "novembro";
	else 
		$saida .= "dezembro";

	// concatenando o ano a data
	$saida .= " de " . $ano;

	echo ("$saida ");



?>