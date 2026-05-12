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
                        <input type="text" name="nome" id="nome">
                        <label for="nome">Nome</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">calendar_today</i>
                        <input type="date" name="nasc" id="nasc">
                        <label for="nasc">Nascimento</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">phone</i>
                        <input type="tel" name="fone" id="fone">
                        <label for="fone">Telefone</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">email</i>
                        <input type="email" name="email" id="email">
                        <label for="email">E-mail</label>
                    </div>

                </div>

                <!-- Sexo -->
                <div class="row">
                    <div class="col s12">
                        <p><strong>Sexo</strong></p>

                        <p>
                            <label>
                                <input class="with-gap" type="radio" name="sexo" value="m">
                                <span>Masculino</span>
                            </label>
                        </p>

                        <p>
                            <label>
                                <input class="with-gap" type="radio" name="sexo" value="f">
                                <span>Feminino</span>
                            </label>
                        </p>

                        <p>
                            <label>
                                <input class="with-gap" type="radio" name="sexo" value="i">
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
                                <input type="checkbox" name="bb">
                                <span>Banco do Brasil</span>
                            </label>
                        </p>

                        <p>
                            <label>
                                <input type="checkbox" name="bradesco">
                                <span>Bradesco</span>
                            </label>
                        </p>

                        <p>
                            <label>
                                <input type="checkbox" name="nu">
                                <span>Nubank</span>
                            </label>
                        </p>

                        <p>
                            <label>
                                <input type="checkbox" name="itau">
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