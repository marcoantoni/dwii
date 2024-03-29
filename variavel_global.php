<?php
    $a = 5;
    $b = 5;
   

    function somar() {
        global $a, $b;

        $b = $a + $b;
    }

    somar();
   // echo $b;   // 10

    $GLOBALS["nome"] = "Marcelo";
    $GLOBALS["sobrenome"] = "da Silva";

    function mostrar(){
        echo ("Nome completo: " . $GLOBALS["nome"] . " " . $GLOBALS["sobrenome"]);
    }

    mostrar();
?>

