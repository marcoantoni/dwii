<?php

    // O require inclui e executa o arquivo "arquivo.php"
    // Diferença importante: se o arquivo NÃO existir, o require gera um ERRO FATAL
    // e o script é interrompido imediatamente enquanto o include apenas emite um AVISO e o script continua em execução
    require("arquivo.php");

    // Aqui estamos acessando variáveis que  foram definidas dentro do arquivo incluído
    echo ("Nome: $nome <br>");
    echo ("Idade: $idade <br>");

    // -------------------------------------------------------
    // Diferença entre include_once e require_once:
    //
    // include_once: inclui o arquivo SOMENTE se ele ainda não foi incluído antes
    // require_once: mesma ideia, mas com erro fatal caso o arquivo não exista
    // -------------------------------------------------------

    // Alterando o valor da variável $nome após o require
    $nome = "Matheus";

    // Tentando incluir novamente o mesmo arquivo
    // Como usamos include_once, o PHP NÃO irá incluir novamente,
    // pois ele já foi incluído anteriormente com o require.
    include_once ("arquivo.php");

    // Se fosse apenas include (sem _once), o arquivo seria incluído novamente,
    // podendo sobrescrever o valor de $nome dependendo do conteúdo do arquivo.php

    // Aqui será exibido "Matheus", pois o include_once NÃO reexecutou o arquivo
    echo ("Nome: $nome <br>");

?>