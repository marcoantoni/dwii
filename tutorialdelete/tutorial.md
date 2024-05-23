# Deletando os registos do banco de dados
Este tutorial tem objetivo de ensinar a deletar os registros do banco de dados da aplicação que está sendo desenvolvida em aula. No momento, já foi elaborada a tela para mostrar os registros conforme a imagem abaixo. Repare que já foram adicionados os botões para editar e excluir.
![Alt text](1.png?raw=true "interface da aplicação")
Primeiramente, será necessário importar o banco de dados caso ele não exista. Faça o download do [banco de dados disponível no Moodle](https://moodle.ifrs.edu.br/pluginfile.php/5906225/mod_resource/content/6/dwii.sql).

Vamos analisar os registros dentro do banco de dados:
![Alt text](2.png?raw=true "registros no banco de dados")

A ação de deletar um registro é a mais simples de todas as operações, pois basta chamar uma página responsável por excluir o arquivo, passando como parametro a chave primária do registro a ser excluído, neste caso o `id`. Desta forma, para excluir o aluno de nome **Fernando**, teremos que passar como parametro o `id=2`. Assim, o arquivo **mostrar.php** onde os dados da tabela são apresentados, será preciso inserir o link no botão de **excluir** para que quando o usuário passe o mouse em cima, seja criado um link dinâmico contendo o **id** do usuário, ou seja, quando isso acontececer, o link apontará para o arquivo `excluir.php` passando como parametro o id do aluno e o seu respectivo valor. A parte final do link gerado será similar a isto: **excluir.php?id=2**

O botão de excluir está sendo criado na linha 56 do arquivo (disponível desenvolvido na aula), com o tendo o seguinte conteúdo:
```php
<a href=\"#\" class=\"del_btn\">Excluir</a>
```
Será necessário definir o link para a página de edição:
```php
<a href=\"excluir.php?id=$row[id]\" class=\"del_btn\">Excluir</a>
```
`$row[id]` é o array que contém os dados que estão vindo do banco de dados. Com isso, ao passar o mouse sobre o botão ***excluir***, o link gerado será alterado conforme o `id` de cada usuário. A imagem abaixo mostra o link gerado ao passar o mouse em cima do aluno ***Fernando***.
![Alt text](3.png?raw=true "link gerado")

Agora será necessário criar o arquivo `excluir.php`, que conterá a lógica de exclusão do registro. Esse arquivo deve estar dentro da mesma pasta onde está o arquivo `mostrar.php`.

Dentro desse arquivo, começamos abrindo as tags do PHP e a conexão com o banco de dados sem seguinte.
```php
<?php
// ajuste os parametros conforme o seu usuário, senha e banco de dados
	$conn = mysqli_connect("127.0.0.1", "root", "", "dwii");

	// conexão bem sucedida
	if ($conn) {
```
Se a conexão com o banco de dados tiver sucesso, podemos prosseguir com a lógica da exclusão. Agora será necessário recuperar o **id** do usuário que está vindo como parametro da página `mostrar.php`. Parametros presentes na URL usam o método GET, por isso, usamos a variavel `$_GET['nomeParametro']` para recuperar o valor presente na URL.

```php
$id_usuario = (int) $_GET['id'];
```
Aqui é criada a variavel **$id_usuario**  que contém o valor vindo da URL. O *(int)* força a conversão do parêmetro para inteiro, ou seja, se for tentado inserir o parametro 2.1 na URL, o valor recuperado será a parte inteira do número, ou seja, o valor **2**.

Depois disso, é necessário criar a consulta SQL responsável por excluir o registro do banco de dados
```php
$sql = "DELETE FROM alunos WHERE id = $id_usuario";	
```
Nessa consulta, ***alunos*** é a tabela e ``id`` é o nome da chave primária da tabela. `id_aluno` conterá o id do usuário que será excluído, conforme o parâmetro recebido pela URL. Em seguida, é necessário executar a consulta através da função `mysqli_query`. Nas consultas de exclusão, assim como nas de inserção, a função retornará `true` caso ela tenha sido executada com sucesso, por isso, faremos um teste para determinar se o aluno foi ou não excluído.

```php
if (mysqli_query($conn, $sql) ){
	echo ("Aluno excluido com sucesso");
} else {
	echo ("Houve um erro ao inserir o registro: <br> $sql");
}
```

Por fim, fechamos a chave do teste da conexão bem sucedida e também fechamos a conexão com o banco de dados e tag do PHP.
```php
}
	mysqli_close($conn);
?>
```

Agora podemos testar o código: Na página responsável por mostrar os registros, ao clicar no botão de *excluir*, você será redirecionado para a página **excluir.php** e deverá ser mostrada a mensagem **Aluno excluido com sucesso**, conforme a imagem a baixo. No momento, essa mensagem ficará fixa, sem redirecionar para outras páginas. Nas próximas aulas, faremos o redirecionamento e armezenaremos essa mensagem na sessão, para então mostrar essa mensagem em outra página, tornando a aplicação mais interativa. 
![Alt text](4.png?raw=true "exclusão com sucesso")

O arquivo final terá esse conteúdo. E pode ser acessado [aqui](https://github.com/marcoantoni/dwii/blob/main/aluno/excluir.php).
```php
1. <?php
2.	
3.	// ajuste os parametros conforme o seu usuário, senha e banco de dados
4	$conn = mysqli_connect("127.0.0.1", "root", "", "dwii");
5
6	// conexão bem sucedida
7	if ($conn) {
8		$id_usuario = $_GET['id'];
9		
10		$sql = "DELETE FROM alunos WHERE id = $id_usuario";	
11
12		if (mysqli_query($conn, $sql) ){
13			echo ("Aluno excluido com sucesso");
14		} else {
15			echo ("Houve um erro ao inserir o registro: <br> $sql");
16		}
17	}
18
19	mysqli_close($conn);
20 ?>
```

