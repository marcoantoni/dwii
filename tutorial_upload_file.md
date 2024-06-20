# Upload de arquivos
## Desenvolvimento Web II

### Introdução
Um sistema não se limita a apenas armazenar dados textuais, pois pode ser necessário enviar uma foto ou algum outro tipo de documento (exemplos: comprovantes de residência, CPF, RG ou CNH). Nessa aula iremos aprender a fazer o upload de arquivos no PHP.

### Ponto de partida
Faça o download de todos arquivos do CRUD desenvolvido em aula. Editaremos o arquivo **form_cadastro.php**, permitindo que o usuário envie uma imagem de usuário. 

Acrescente o atributo ```enctype="multipart/form-data"``` na tag de abertura do ***form***. Depois adicione o input para receber o arquivo ```<input name="foto" type="file">```. Utilize os mesmos estilos CSS dos outros atributos. Sem esse atributo, o formulário não enviará arquivos para o servidor.

Na seção do PHP (arquivo **salvar.php**), insira o código abaixo após a criação da varíavel $sql. Vamos começar criando duas variáveis: uma que conterá uma string que representa a pasta onde o arquivo será salvo e a outra que conterá o nome completo do arquivo. 
```php
$uploaddir = 'fotos/';
$uploadfile = $uploaddir . basename($_FILES['foto']['name']);
```
Crie uma pasta chamada **fotos** dentro da mesma pasta que estão os arquivos referente as operações do CRUD relacionadas ao aluno. Ao fazer o upload de um arquivo, ele estará acessível na varíavel ```$_FILES``` e não na varíavel ```$_POST```. A varíavel **$_FILES** contém algumas informações que são necessárias para salvar o arquivo:
 - ```$_FILES["foto"]["name"]``` → Contém o nome original do arquivo  (nome no dispositivo do cliente)
 - ```$_FILES["foto"]["tmp_name"]``` → Contém o nome temporário do arquivo (no servidor)
 - ```$_FILES["foto"]["error"]``` → Contém o código de erro relacinado ao upload (caso houver)

Repare que **foto** é o nome definido atributo *name* que foi definido no *input* do tipo ***file***.

Entendendo isso, vamos fazer o upload do arquivo, salvando-o no servidor através da função **move_uploaded_file**. Essa função recebe dois parâmetros: o caminho de origem da imagem e o caminho de destino. Ela retorna true em caso de sucesso, portanto, faremos um if para testar se houve sucesso.
```php
if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
    echo "Arquivo enviado com sucesso.\n";
} 
```

Esse código funciona e já faz o upload do arquivo, mas devemos fazer outras validações ainda. Primeiro, só vamos fazer o upload do arquivo, **se houver um arquivo**. Para isso, vamos colocar o código do upload dentro de um if
```php
if ($_FILES['foto']['error'] != 4){
    // código feito anteriormente aqui
}
```
O código de erro 4 indica que não foi escolhido o arquivo, logo, o != de 4 indica que foi enviado um arquivo.

Agora falta armazenar o nome da imagem no banco de dados, para que depois possamos exibi-lá no HTML. 

Antes do if feito acima, vamos inicializar a varíavel **$uploadfile** com o valor vazio, pois caso não exista a imagem, devemos inserir uma string vazia como sendo o nome do arquivo no no banco de dados. Para isso adicione ```$uploadfile = "";```

Ao salvar um arquivo, o nome dele pode conter espaços em branco, o que não funciona bem nos sistemas operacionais Linux, dessa forma, iremos gerar um nome de arquivo único, baseado no horário do servidor. A ideia será: criar um nome aleaório e adicionar a extensão do arquivo a esse nome, portanto, vamos deixar o código assim:
```php
$uploadfile = "";

if ($_FILES['foto']['error'] != 4){
    $uploaddir = 'fotos/';
    $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    $nome_arquivo = time() . "." . $ext;
    $uploadfile = $uploaddir . $nome_arquivo;

//continuacao...    
if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
```

Finalmente, substituia o código ```echo "Arquivo válido e enviado com sucesso.";``` pelo código abaixo: 
```sql
$sql = "INSERT INTO alunos (nome, nascimento, email, telefone, sexo, id_curso, foto) VALUES ('$nome', '$nascimento', '$email', '$telefone', $sexo, $curso, '$nome_arquivo')";
```
Perceba que a única mudança é a adição de um campo chamado **foto** (que deve ser criado no banco de dados, com o tipo *varchar* ou *text*) e a adição do ```'$nome_arquivo'```. 

### Para pesquisar
Como exibir a imagem enviada **dinâmicamente**?
### Referências
 [Upload de arquivos com o método POST ](https://www.php.net/manual/pt_BR/features.file-upload.post-method.php)

 [move_uploaded_file](https://www.php.net/manual/en/function.move-uploaded-file.php)

 [Explicando mensagens de erro do move_uploaded_file](https://www.php.net/manual/pt_BR/features.file-upload.errors.php)
 
 [Leitura relacionada: Upload de imagens com redimensionamento em PHP](https://www.devmedia.com.br/classe-para-upload-de-imagens-em-php-com-redimensionamento/28573)
