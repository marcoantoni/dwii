<?php
	// declaracao de variaveis globais 
	$GLOBALS['n1'] = 10;
	$GLOBALS['n2'] = 20;

	$numero = 10;
	function somar(){
		return $GLOBALS["n1"] + $GLOBALS["n2"];
	}

	echo ("A soma é " . somar() );

	

	function calcularIdade($nascimento){
		$ano_atual = date("Y");

		$idade = $ano_atual - $nascimento;

		return $idade;
	}

	echo ("Fulano tem " . calcularIdade(1993) . " anos");

	// isso gera um warning
	echo ("Fulano tem $idade anos");	

?>