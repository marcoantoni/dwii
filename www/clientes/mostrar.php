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
        <h4>Clientes Cadastrados</h4>

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
                <tr>
                    <td>João Silva</td>
                    <td>1990-05-10</td>
                    <td>(11) 99999-1111</td>
                    <td>joao@email.com</td>
                    <td>Masculino</td>
                    <td>BB, Itaú</td>
                    <td>
                        <a class="btn-small blue"><i class="material-icons">edit</i></a>
                        <a class="btn-small red"><i class="material-icons">delete</i></a>
                    </td>
                </tr>

                <tr>
                    <td>Maria Souza</td>
                    <td>1985-08-22</td>
                    <td>(21) 98888-2222</td>
                    <td>maria@email.com</td>
                    <td>Feminino</td>
                    <td>Nubank</td>
                    <td>
                        <a class="btn-small blue"><i class="material-icons">edit</i></a>
                        <a class="btn-small red"><i class="material-icons">delete</i></a>
                    </td>
                </tr>

                <tr>
                    <td>Carlos Lima</td>
                    <td>2000-01-15</td>
                    <td>(31) 97777-3333</td>
                    <td>carlos@email.com</td>
                    <td>Masculino</td>
                    <td>Bradesco, BB</td>
                    <td>
                        <a class="btn-small blue"><i class="material-icons">edit</i></a>
                        <a class="btn-small red"><i class="material-icons">delete</i></a>
                    </td>
                </tr>

                <tr>
                    <td>Ana Pereira</td>
                    <td>1995-12-03</td>
                    <td>(41) 96666-4444</td>
                    <td>ana@email.com</td>
                    <td>Feminino</td>
                    <td>Itaú</td>
                    <td>
                        <a class="btn-small blue"><i class="material-icons">edit</i></a>
                        <a class="btn-small red"><i class="material-icons">delete</i></a>
                    </td>
                </tr>

                <tr>
                    <td>Lucas Martins</td>
                    <td>1988-07-19</td>
                    <td>(51) 95555-5555</td>
                    <td>lucas@email.com</td>
                    <td>Masculino</td>
                    <td>Nubank, Bradesco</td>
                    <td>
                        <a class="btn-small blue"><i class="material-icons">edit</i></a>
                        <a class="btn-small red"><i class="material-icons">delete</i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>
</html>