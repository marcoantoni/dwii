<?php
	//configurando o timezone para sao paulo
	date_default_timezone_set("America/Sao_Paulo");

	// exibindo a data completa
	// d - exibe o dia do mes com 2 digitos
	// m - exibe o mês com 2 digitos
	// Y - exibe o ano com 4 digitos
	echo (date("d/m/Y") );

	// dia da semana
	// 1 = segunda 7 = domingo
	echo (date("D") );

	echo $diaSemana = date("N");

	switch($diaSemana) {
		case 1: 
			echo ("Segunda-feira");
			break;
		case 2: 
			echo ("Terça-feira");
			break;
		case 3: 
			echo ("Quarta-feira");
			break;
		case 4: 
			echo ("Quinta-feira");
			break;
		case 5: 
			echo ("Sexta-feira");
			break;
		case 6: 
			echo ("Sábado-feira");
			break;
		case 7: 
			echo ("Domingo");
			break;
	}

	// exibindo o horário do servidor
	// H - hora 
	// i - minutos
	// s - segundos
	echo (date("H:i:s") );

	// definindo um array
	$array1 = array("Pedro", 50, 1.76);

	//acessando o indice 2 do array
	echo ("<br>Altura: " . $array1[2]);

	// acrescentar uma informação ao array
	$array1[] = "Carlos"; // adicionando um string no array
	echo ($array1[3]);

	//	$array1[10] = "Maria"; // adicionando um valor na posição 10
	// echo ($array1[10]);
	
	$array1[] = "Maria"; // adicionando um valor na posição 10

	$array1[3] = "Márcio";	// sobrescrevendo a posição 3 do array
	echo ($array1[3]);

	// count - retorna o numero de elementos de um array
	echo ("O array tem " . count($array1) . " elementos");

	// print_r exibe um array na tela
	print_r($array1);

	echo ("<br>percorrento o array com um for<br>");

	for ($i=0; $i<count($array1); $i++){
		echo ($array1[$i] . " ");
	}

	echo ("<br>usando o foreach para percorrer o array<br>");

	foreach($array1 as $key){
		echo ("$key ");
	}

	// array associativo
	$func1 = array(
		"nome" => "João", 
		"nascimento" => "21/04/1997",
		"profissao" => "Analista de Sistemas",
		"salario" => 4.809
	);

	// mostrando um array associativo
	echo ("<br>Nome: " . $func1["nome"]);	//forma 1
	//forma 2
	echo ("<br>Nascimento: $func1[nascimento] ");
	echo ("<br>Profissão: $func1[profissao] ");
	echo ("<br>Salário $func1[salario] ");

	// outra forma de criar um array
	$numeros = [10, 40, 12, 12, 38, 99, 89];

	// 

	$posicao_encontrado = array_search(38, $numeros);


	if ($posicao_encontrado == false)
		echo ("Não encontrou");
	else
		echo ("O numero está na posição " . $posicao_encontrado);

	// ordenando o array de forma crescente

	echo ("<br>Array antes de ser ordenado com o sort<br>");
	print_r($numeros);

	sort($numeros);

	echo ("<br>Array depois de ser ordenado com o sort<br>");

	print_r($numeros);

	// rsort ordena de maneira decrescente

	echo ("<br>Array depois de ser ordenado com o rsort<br>");
	rsort($numeros);
	print_r($numeros);

	$string = "Mateus:20:1.75:Técnico em informática";

	// retorna um array com informações separadas pelo delimitador
	$informacao = explode(":", $string);

	print_r($informacao);

?>