<?php
	function somar($n1, $n2){
		$resultado = $n1+$n2;
		echo ("A soma $n1 + $n2 " . $resultado );
	}

	function subtrair($n1, $n2){
		return $n1 - $n2;
	}

	// duas funções com mesmo nome geram um erro fatal
	/*function somar($n1, $n2){
		return $n1+$n2;
	} */

	somar(8, 18);

	$resultado_subtracao = subtrair(100, 18);

	echo ("O resultado da subtração é $resultado_subtracao");

	echo ("O resultado da subtracao entre 40 - 18 é " . subtrair(40, 18) );
?>