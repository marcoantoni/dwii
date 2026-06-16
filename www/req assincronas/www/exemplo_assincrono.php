<?php
    //require_once("../protege.php");

    function tipoParaTexto($tipo){
        switch($tipo){
            case 1: return "Administrador";
            case 2: return "Pessoa física";
            case 3: return "Pessoa jurídica";
            default: return "Desconhecido";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>

    <!-- Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

    <!-- Ícones Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        .alert {
            transition: opacity 0.5s;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="grey lighten-4">

    <?php
        session_start();
        $_SESSION["pagina_ativa"] = "ex_assincrono"; 
        require("menu.php"); 
    ?>

    <main class="container" style="margin-top: 30px;">
        <h4 class="center-align">Exemplo de comunicação assíncrona</h4>
        <p>Este é um exemplo de comunicação assíncrona em uma página web. Quando o usuário seleciona um <b>estado</b>, é feita uma requisição assíncrona utilizando o método <code>GET</code> para o arquivo <code>buscar_cidade.php</code>, passando o estado como parâmetro.</p> 
        <p>O arquivo <code>buscar_cidade.php</code> processa a solicitação e retorna uma resposta contendo todas as cidades correspondentes ao estado informado. Esses dados são então utilizados para preencher dinamicamente o campo de seleção de <b>cidades</b>.</p> 
        <p>Esse exemplo representa um cenário em que o cliente (navegador) se comunica com o servidor por meio de uma API, permitindo a troca de dados de forma eficiente e sem a necessidade de recarregar a página.</p>
        <br>
        <form method="POST" action="proc_cadastro.php">
          <!-- Estado (UF) -->
          <div class="input-field">
            <select id="estado" name="estado" required>
              <option value="" disabled selected>Selecione o estado</option>
              <?php
                require("conecta.php");

                $sql = "SELECT * FROM estado ORDER BY nome";

                $resultado = mysqli_query($conn, $sql);

                // usando a sintaxe alternativa do php para não ficar concatenando strings...
                while ($row = mysqli_fetch_assoc($resultado) ):

              ?>

              <option value="<?= $row['Uf']?>"><?= $row["Nome"] ?></option>

              <?php
                endwhile;
              ?>
            </select>
            <label for="estado">Estado (UF)</label>
          </div>

          <!-- Cidade -->
          <div class="input-field">
            <select id="cidade" name="cidade" required>
              <option value="" disabled selected>Selecione a cidade</option>
              <!-- As opções serão adicionadas via JavaScript futuramente -->
            </select>
            <label for="cidade">Cidade</label>
          </div>

          <!-- Botão -->
          <div class="center-align">
            <button class="btn waves-effect waves-light" type="submit">
              Enviar
              <i class="material-icons right">send</i>
            </button>
          </div>
        </form>
    </main>

  <!-- JavaScript do Materialize (apenas para o select funcionar visualmente) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <!-- Inicialização dos selects -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const selects = document.querySelectorAll('select');
      M.FormSelect.init(selects);
    });
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const estadoSelect = document.getElementById('estado');
      const cidadeSelect = document.getElementById('cidade');

      // Desativa o select de cidade inicialmente
      cidadeSelect.disabled = true;

      estadoSelect.addEventListener('change', function () {
        const uf = this.value;

        // Se UF não selecionada, limpa e desativa o campo cidade
        if (!uf) {
          cidadeSelect.innerHTML = '';
          cidadeSelect.disabled = true;
          return;
        }
        
        //fetch('buscar_cidade.php', {
        //  method: 'POST',
        //  headers: {
        //   'Content-Type': 'application/x-www-form-urlencoded'
        //  },
        //  body: 'uf=' + encodeURIComponent(uf)
        //})
        
      
        fetch('buscar_dados/buscar_cidade.php?uf=' + encodeURIComponent(uf), {
          method: 'POST'
        })
        .then(response => {
          if (!response.ok) throw new Error('Erro na resposta do servidor');
          return response.json();
        })
        .then(cidades => {
          // Limpa o select de cidades
          cidadeSelect.innerHTML = '';

          // Adiciona opção padrão
          const defaultOption = document.createElement('option');
          defaultOption.value = '';
          defaultOption.textContent = 'Selecione a cidade';
          cidadeSelect.appendChild(defaultOption);

          // Adiciona as cidades
          cidades.forEach(function (cidade) {
            const option = document.createElement('option');
            option.value = cidade.id;
            option.textContent = cidade.municipio;
            cidadeSelect.appendChild(option);
          });

          cidadeSelect.disabled = false;
          M.FormSelect.init(cidadeSelect);

        })
        .catch(error => {
          alert('Houve um erro ao carregar as cidades.');
          cidadeSelect.innerHTML = '';
          cidadeSelect.disabled = true;
          console.error(error);
        });
      });
    });
  </script>

    <!-- Footer -->
    <footer class="page-footer blue darken-3" style="margin-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <p class="grey-text text-lighten-4">Disciplina de Redes de Computadores - prof. Marco Antoni.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
