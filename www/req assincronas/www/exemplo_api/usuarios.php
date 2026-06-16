<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

error_reporting(E_ALL);
ini_set('display_errors', 1);

require("../conecta.php");

function getDados() {
    return json_decode(file_get_contents("php://input"), true);
}

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {

    // =====================
    // GET
    // =====================
    case 'GET':

        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);

            $sql = "
                SELECT
                    id,
                    nome,
                    DATE_FORMAT(nascimento, '%d/%m/%Y') AS nascimento,
                    email,
                    tipo
                FROM usuarios
                WHERE id = $id
            ";
        } else {

            $sql = "
                SELECT
                    id,
                    nome,
                    DATE_FORMAT(nascimento, '%d/%m/%Y') AS nascimento,
                    email,
                    tipo
                FROM usuarios
                ORDER BY nome
            ";
        }

        $resultado = mysqli_query($conn, $sql);

        echo json_encode(
            mysqli_fetch_all($resultado, MYSQLI_ASSOC)
        );

        break;

    // =====================
    // POST
    // =====================
    case 'POST':

        $dados = getDados();

        $nome = $dados['nome'] ?? '';
        $email = $dados['email'] ?? '';
        $nascimento = $dados['nascimento'] ?? null;
        $tipo = $dados['tipo'] ?? 2;

        $sql = "
            INSERT INTO usuarios
            (
                nome,
                email,
                nascimento,
                tipo
            )
            VALUES
            (
                '$nome',
                '$email',
                '$nascimento',
                $tipo
            )
        ";

        if(mysqli_query($conn, $sql)){
            echo json_encode([
                "mensagem" => "Usuário inserido"
            ]);
        } else {
            http_response_code(500);

            echo json_encode([
                "erro" => "Erro ao inserir usuário"
            ]);
        }

        break;

    // =====================
    // PUT
    // =====================
    case 'PUT':

        if (!isset($_GET['id'])) {
            echo json_encode([
                "erro" => "ID obrigatório"
            ]);
            break;
        }

        $id = intval($_GET['id']);

        $dados = getDados();

        $nome = $dados['nome'] ?? '';
        $email = $dados['email'] ?? '';

        $sql = "
            UPDATE usuarios
            SET
                nome = '$nome',
                email = '$email'
            WHERE id = $id
        ";

        if(mysqli_query($conn, $sql)){
            echo json_encode([
                "mensagem" => "Usuário atualizado"
            ]);
        } else {
            http_response_code(500);

            echo json_encode([
                "erro" => "Erro ao atualizar"
            ]);
        }

        break;

    // =====================
    // DELETE
    // =====================
    case 'DELETE':

        if (!isset($_GET['id'])) {
            echo json_encode([
                "erro" => "ID obrigatório"
            ]);
            break;
        }

        $id = intval($_GET['id']);

        $sql = "DELETE FROM usuarios WHERE id = $id";

        if(mysqli_query($conn, $sql)){
            echo json_encode([
                "mensagem" => "Usuário excluído"
            ]);
        } else {
            http_response_code(500);

            echo json_encode([
                "erro" => "Erro ao excluir"
            ]);
        }

        break;

    default:

        http_response_code(405);

        echo json_encode([
            "erro" => "Método não permitido"
        ]);
}

mysqli_close($conn);
