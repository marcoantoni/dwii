<?php
	/* 
	   Exemplo usando o comando switch
	   0 é domingo
	   6 é sabádo
	*/
	$dia_semana = 4;

	switch($dia_semana){
		case 0:
			echo ("Domingo");
			break;
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
			echo ("Sábado");
			break;
		default: 
			echo ("Dia da semana inválido. Por favor, insira valores entre 0 e 6");
	}

	echo ("<br>");

	// faz a mesma coisa que o exemplo acima, mas usando vários ifs
	if ($dia_semana == 0)
		echo ("Domingo");
	else if ($dia_semana == 1)
		echo ("Segunda-feira");
	else if ($dia_semana == 2)
		echo ("Terça-feira");
	else if ($dia_semana == 3)
		echo ("Quarta-feira");
	else if ($dia_semana == 4)
		echo ("Quinta-feira");
	else if ($dia_semana == 5)
		echo ("Sexta-feira");
	else if ($dia_semana == 6)
		echo ("Sábado");
	else
		echo ("Dia da semana inválido. Por favor, insira valores entre 0 e 6");

	// laço de repetição contado
	// 1ª é a inicialização da variavel
	// 2ª é a condição de saída
	// 3ª é o incremento
	for ($i=0; $i < 10; $i++){
		echo ("<br>Executando o for pela $i vez");
		//echo ("<br>Executando pela " . ($i+1) . " vez");
	}

	// laço de repetição com pré-validação
	$status = false; // variavel para controle da execução do laço
	$j = 0; // variavel de controle para interromper o laço
	while ($status){
		if ($j == 9)
			$status = false;

		echo ("<br>Executando o while pela $j vez");
		$j++;
	}

	// laço de repetição com pós validação
	// vai ser executado pelo menos uma vez...
	$encontrado = false;
	$k=0;

	do {
		echo ("<br>Executando o do while pela $k vez");

		if ($k == 9)
			$encontrado = true;
		
		$k++;

	// ao final da execução, será avaliado se segue executando ou não
	} while (!$encontrado);
	 //while ($encontrado != true);