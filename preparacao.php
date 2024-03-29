<?php
	
$frutas = "Maçã, Laranja, Banana, Morango";

// Dividindo a string em um array usando a vírgula como delimitador
$array_frutas = explode(",", $frutas);

// Exibindo o array resultante
print_r($array_frutas);