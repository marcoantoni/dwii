<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>

    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
    <!-- Ícones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            // Verifica se existe uma mensagem salva na sessão
            if (isset($_SESSION["msg"])):
        ?>

        <!-- Caixa de mensagem utilizando Materialize CSS -->
        <div id="mensagem" class="card-panel <?= $_SESSION["cor"] ?> white-text" style="position: relative; padding-right: 50px;">

            <!-- Exibe o texto da mensagem armazenada na sessão, que será criada no arquivo processa.php -->
            <?= $_SESSION["msg"] ?>

            <!-- Botão para fechar a mensagem -->
            <button 
                onclick="fecharMensagem()"
                style="
                    position: absolute;
                    right: 10px;
                    top: 8px;
                    background: none;
                    border: none;
                    color: white;
                    font-size: 22px;
                    cursor: pointer;
                ">
                &times;
            </button>
        </div>
        <?php
            // Remove os dados da sessão após exibir a mensagem
            unset($_SESSION["cor"]);
            unset($_SESSION["msg"]);

            // Finaliza a estrutura condicional
            endif;
        ?>

        <script>
            // função para fechar a mensagem em 5 segundos (5000 milisegundos)
            function fecharMensagem(){
                document.getElementById("mensagem").style.display = "none";
            }

            // Fecha automaticamente após 5 segundos
            setTimeout(fecharMensagem, 5000);

        </script>
        <h4>Clientes Cadastrados</h4>

        <?php
            // Inclui o arquivo responsável pela conexão com o banco de dados
            // require_once garante que o arquivo será carregado apenas uma vez
            // e interrompe o sistema caso ele não exista
            require_once("../conecta.php");

            // Monta a consulta SQL para buscar todos os clientes
            // ORDER BY nome ASC → ordena os resultados pelo nome em ordem alfabética
            $sql = "SELECT * FROM clientes ORDER BY nome ASC";

            // Executa a consulta no banco de dados
            // $resultado armazenará o conjunto de dados retornado (result set)
            $resultado = mysqli_query($conn, $sql);

            // mysqli_num_rows conta quantas linhas tem um result set
            // Verifica se a consulta retornou algum registro
            if (mysqli_num_rows($resultado) > 0) {

                // Se houver registros, começa a montar a tabela HTML dinamicamente
                echo ('
                    <table class="striped highlight responsive-table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Nascimento</th>
                                <th>Telefone</th>
                                <th>Email</th>
                                <th>Sexo</th>
                                <th>Bancos</th>
                                <th>Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                ');

                // Laço de repetição para percorrer todos os registros retornados
                // mysqli_fetch_array pega uma linha por vez do resultado (result set)
                while ($row = mysqli_fetch_array($resultado) ){

                    // Inicia uma nova linha da tabela
                    echo ("<tr>");

                    // Exibe os dados de cada coluna
                    // $row["campo"] acessa o valor da coluna retornada pelo banco
                    echo ("<td> $row[nome] </td>");
                    echo ("<td>" . $row["nasc"] . "</td>"); // concatenação como alternativa
                    echo ("<td> $row[fone] </td>");
                    echo ("<td> $row[email] </td>");
                    echo ("<td> $row[sexo] </td>");

                    // Coluna que exibirá os bancos onde o cliente possui conta
                    echo ("<td>");

                    // Uso do operador ternário:
                    // condição ? valor_se_verdadeiro : valor_se_falso
                    // Aqui verificamos se o campo é 1 (true no banco) para exibir o nome do banco

                    echo ($row["bb"] == 1 ? "Banco do Brasil " : "");
                    echo ($row["bradesco"] == 1 ? "Bradesco " : "");
                    echo ($row["itau"] == 1 ? "Itaú " : "");
                    echo ($row["nubank"] == 1 ? "Nubank " : "");

                    echo ("</td>");

                    // Coluna de ações (botões de editar e excluir)
                    // Ainda não possuem funcionalidade, apenas interface
                    echo ('
                        <td>
                            <a class="btn-small blue"><i class="material-icons">edit</i></a>
                            <a class="btn-small red"><i class="material-icons">delete</i></a>
                        </td>
                    ');

                    // Fecha a linha da tabela
                    echo ("</tr>");
                }

            } else {
                // Caso não existam registros, exibe uma mensagem simples
                echo ("<p>Não há nenhum registro para ser exibido</p>");
            }

            // --------------------------------------------
            // TAREFAS PARA FAZER
            // --------------------------------------------
            // 1º Exibir a data no formato do Brasil (dia/mes/ano)
            // 2º Criar uma função para exibir o sexo do cliente (masculino, feminino ou intersexo)
            // 3º Colocar os nomes dos bancos separados por ",". Será necessário alterar o código desenvolvido. Dica: usar a função "implode". 

    ?>
                            
    </div>

    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>