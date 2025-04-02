<?php
header("Content-Type: application/json");

$host = "localhost";
$dbname = "corretores";
$user = "root";
$pass = "";
$port = "3306";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["status" => "erro", "mensagem" => "Erro Interno, Aguarde e Tente Novamente "]);
    http_response_code(500);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $json = file_get_contents("php://input");
    $dados = json_decode($json, true);
    
    
    if (!$dados || !isset($dados["Id"])) {
        echo json_encode(["status" => "erro", "mensagem" => "Dados inválidos ou ausentes"]);
        http_response_code(400);
        exit;
    }
    
    $Id = trim($dados["Id"]);
    
//---------------------------------------------------------------------------------Insere Dados-------------------------------------------------------------------------------
    
    try {
            $sql = "Delete FROM Usuarios Where id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $Id);
            $stmt->execute();
      
            $sql = "SELECT * FROM usuarios";
            $stmt = $pdo->query($sql);
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            echo json_encode([
                "status" => "sucesso",
                "mensagem" => "Usuário Deletado com sucesso!",
                "usuarios" => $usuarios
            ]);
        http_response_code(201);

    } catch (PDOException $e) {
        echo json_encode(["status" => "erro", "mensagem" => "Erro ao Deletar no banco: " . $e->getMessage()]);
        http_response_code(500);
    }
    
}
else 
{
    echo json_encode(["status" => "erro", "mensagem" => "Falha na Exclusão: " . $e->getMessage()]);
    http_response_code(500);
    exit;
}

?>