<?php
    /*
        Código responsável pela exclusão apenas quando o método da requisição for DELETE
    */

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: DELETE");
    header("Access-Control-Allow-Headers: Content-Type");

    // Apenas permite método DELETE
    if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
        http_response_code(405);
        echo json_encode(["erro" => "Método não permitido"]);
        exit;
    }

    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input["id"])) {
        http_response_code(400);
        echo json_encode(["erro" => "ID não informado"]);
        exit;
    }

    require("conecta.php");

    $id = intval($input["id"]);

    $sql = "DELETE FROM usuarios WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) == 1) {
            echo json_encode(["mensagem" => "Usuário excluído com sucesso"]);
        } else {
            http_response_code(404);
            echo json_encode(["erro" => "Usuário não encontrado"]);
        }
    } else {
        http_response_code(500);
        echo json_encode(["erro" => "Erro ao excluir o registro"]);
    }
?>