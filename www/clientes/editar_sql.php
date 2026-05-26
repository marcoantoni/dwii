<?php
    /* 
     Este arquivo foi criado a partir de editar.php, porém adaptado para utilizar prepared statements, aumentando a segurança contra SQL Injection.
    */
    session_start();

    require_once("../conecta.php");

    // recuperando o id do cliente que vem pela url faz a conversão para inteiro - boa prática
    $id_cliente = filter_var(
        $_GET["id"],
        FILTER_VALIDATE_INT
    );

    // consulta a ser utilizada
    $sql = "SELECT * FROM clientes WHERE id = ?";

    // essa linha inicia a consulta SQL antes da execução.
    $stmt = mysqli_prepare($conn, $sql);

    // aqui são definidos os parametros da consulta (?)
    // i - integer
    // d - double
    // s- string
    // b - blob
    mysqli_stmt_bind_param($stmt, "i", $id_cliente);

    // executa a consulta sql com os valores que foram adicionados a query
    mysqli_stmt_execute($stmt);

    
    // recupera o resultado produzido pela execução da prepared statement
    // e armazena em uma variável para que os registros possam ser manipulados
    $resultado = mysqli_stmt_get_result($stmt);

    // Testa se a consulta retornou exatamente 1 registro
    if (mysqli_num_rows($resultado) == 1) {

        // Se encontrou um registro, significa que o cliente já existe
        // no banco de dados e os dados serão carregados para edição

        // Armazena os dados do cliente encontrados na consulta em um array
        $cliente = mysqli_fetch_array($resultado);

        // Atribui à variável $nome o valor do campo "nome" vindo do banco de dados.
        // Isso é feito para facilitar o uso dos dados no restante do código,
        // deixando as variáveis mais organizadas e fáceis de manipular.
        $nome = $cliente["nome"];
        $nome = $cliente["nome"];
        $nascimento = $cliente["nasc"];
        $fone = $cliente["fone"];
        $email = $cliente["email"];
        $sexo = $cliente["sexo"];

        // colunas que referem-se aos bancos que o cliente tem conta
        $bb = $cliente["bb"];
        $bradesco = $cliente["bradesco"];
        $nubank = $cliente["nubank"];
        $itau = $cliente["itau"];


    } else {
        // se não encontrou nenhum registro...
        $_SESSION["msg"] = "Erro: registro não encontrado ou você não tem permissão de acesso";
        $_SESSION["cor"] = "red";
        header("location: mostrar.php");    // redireciona para o mostrar.php, que exibirá a mensagem de erro
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>

    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

    <!-- Ícones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body{
            background: #f4f6f9;
        }

        .card-form{
            margin-top: 40px;
            padding: 20px;
            border-radius: 12px;
        }

        h4{
            margin-bottom: 30px;
        }

        .bancos{
            margin-top: 20px;
        }

        .btn-custom{
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="container">

        <div class="card z-depth-2 card-form">

            <h4 class="center-align">Cadastro de Clientes</h4>

            <form method="POST" action="processa.php">

                <div class="row">

                    <div class="input-field col s12">
                        <i class="material-icons prefix">person</i>
                        <input type="text" name="nome" id="nome" value="<?= $nome; ?>">
                        <label for="nome">Nome</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">calendar_today</i>
                        <input type="date" name="nasc" id="nasc" value="<?= $nasc; ?>">
                        <label for="nasc">Nascimento</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">phone</i>
                        <input type="tel" name="fone" id="fone" value="<?= $fone; ?>">
                        <label for="fone">Telefone</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input type="email" name="email" id="email" value="<?= $email; ?>">
                        <label for="email">E-mail</label>
                    </div>

                </div>

                <!-- Sexo -->
                <div class="row">
                    <div class="col s12">
                        <p><strong>Sexo</strong></p>

                        <p>
                            <label>
                                <input class="with-gap" type="radio" name="sexo" value="m" <?= $sexo == 'm' ? 'checked' : ''?> >
                                <span>Masculino</span>
                            </label>
                        </p>

                        <p>
                            <label>
                                <input class="with-gap" type="radio" name="sexo" value="f" <?= $sexo == 'f' ? 'checked' : '' ?> >
                                <span>Feminino</span>
                            </label>
                        </p>

                        <p>
                            <label>
                                <input class="with-gap" type="radio" name="sexo" value="i" <?= $sexo == 'i' ? 'checked' : ''?> >
                                <span>Intersexo</span>
                            </label>
                        </p>
                    </div>
                </div>

                <!-- Bancos -->
                <div class="row bancos">
                    <div class="col s12">

                        <p><strong>Em quais bancos você possui conta?</strong></p>

                        <p>
                            <label>
                                <input type="checkbox" name="bb" <?= $bb == 1 ? 'checked' : ''?> >
                                <span>Banco do Brasil</span>
                            </label>
                        </p>

                        <p>
                            <label>
                                <input type="checkbox" name="bradesco" <?= $bradesco == 1 ? 'checked' : ''?>>
                                <span>Bradesco</span>
                            </label>
                        </p>

                        <p>
                            <label>
                                <input type="checkbox" name="nu" <?= $nubank == 1 ? 'checked' : ''?>>
                                <span>Nubank</span>
                            </label>
                        </p>

                        <p>
                            <label>
                                <input type="checkbox" name="itau" <?= $itau == 1 ? 'checked' : ''?> >
                                <span>Itaú</span>
                            </label>
                        </p>

                    </div>
                </div>

                <!-- Senhas -->
                <div class="row">

                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" name="senha" id="senha">
                        <label for="senha">Senha</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">lock_outline</i>
                        <input type="password" name="senha2" id="senha2">
                        <label for="senha2">Repita a senha</label>
                    </div>

                </div>
                <!-- 
                    Campo oculto utilizado para armazenar o ID do cliente.
                    Esse valor é enviado junto com o formulário sem aparecer para o usuário.
                    É usado para identificar qual registro será alterado durante a edição. 
                -->
                <input type="hidden" name="id_cliente" value="<?= $id_cliente; ?>">

                <!-- Botão -->
                <div class="row">
                    <div class="col s12">
                        <button class="btn waves-effect waves-light blue btn-custom" type="submit" name="enviar">
                            Cadastrar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </div>

    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>