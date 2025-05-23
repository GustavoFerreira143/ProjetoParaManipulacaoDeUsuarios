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
    
    
    if (!$dados || !isset($dados["Nome"], $dados["CPF"], $dados["Creci"], $dados["id"])) {
        echo json_encode(["status" => "erro", "mensagem" => "Dados inválidos ou ausentes"]);
        http_response_code(400);
        exit;
    }
    
    $Nome = trim($dados["Nome"]);
    $CPF = preg_replace("/\D/", "", $dados["CPF"]); 
    $Creci = strtoupper(trim($dados["Creci"])); 
    $id = trim($dados["id"]);
    
    //--------------------------------------------------------------------------------Valida Informações-------------------------------------------------------------------------
    
    if (!preg_match("/^[a-zA-ZÀ-ÿ' ]{2,}$/", $Nome)) {
        echo json_encode(["status" => "erro", "mensagem" => "Nome inválido. Use apenas letras e espaços (mínimo 2 caracteres)."]);
        http_response_code(400);
        exit;
    }
    
    if (!validaCPF($CPF)) {
        echo json_encode(["status" => "erro", "mensagem" => "CPF inválido."]);
        http_response_code(400);
        exit;
    }
    
    if (!preg_match("/^[A-Z0-9]{2,15}$/", $Creci)) {
        echo json_encode(["status" => "erro", "mensagem" => "Creci inválido. Deve conter entre 4 e 10 caracteres alfanuméricos."]);
        http_response_code(400);
        exit;
    }
    

    //---------------------------------------------------------------------------------Insere Dados-------------------------------------------------------------------------------
    
    try {
            $sql = "UPDATE usuarios SET nome=:Nome, cpf=:CPF, Creci=:Creci Where id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":Nome", $Nome);
            $stmt->bindParam(":CPF", $CPF);
            $stmt->bindParam(":Creci", $Creci);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        
            $sql = "SELECT * FROM usuarios";
            $stmt = $pdo->query($sql);
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            echo json_encode([
                "status" => "sucesso",
                "mensagem" => "Usuário cadastrado com sucesso!",
                "usuarios" => $usuarios
            ]);

        http_response_code(201);
    } catch (PDOException $e) {
        echo json_encode(["status" => "erro", "mensagem" => "Erro ao inserir no banco: " . $e->getMessage()]);
        http_response_code(500);
    }
    
}
function validaCPF($cpf) {
    if (strlen($cpf) !== 11 || preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        $d = 0;
        for ($c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }

    return true;
}
?>