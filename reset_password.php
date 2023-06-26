<?php
echo 'Teste';
/*
require_once './session.php';

// Verificar se há uma sessão de usuário ou superusuário 
if (!(isset($_SESSION['usuario']) || isset($_SESSION['superusuario']))) { 
    // Redirecionar para a página de login 
    header("Location: login.html"); 
    exit;
}
*/
// Conexão com o banco de dados MySQL usando PDO
$host = '127.0.0.1';
$dbname = 'biblioteca';
$username = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET FOREIGN_KEY_CHECKS=0");
} catch(PDOException $e) {
    die("Falha na conexão com o banco de dados: " . $e->getMessage());
}

// Verifica se os campos foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados do formulário
    $usuario = $_POST["usuario"];
    $novaSenha = $_POST["novaSenha"];
    $Csenha = $_POST["Csenha"];

    // Verifica se as senhas coincidem
    if ($novaSenha !== $Csenha) {
        die("As senhas não coincidem.");
    }

    // Atualiza a senha no banco de dados
    $hashedPassword = password_hash($novaSenha, PASSWORD_DEFAULT);

    /* bloco 1 atualiza senha*/
    $sql1 = "UPDATE cadastro SET senha = :hashedPassword WHERE email = :usuario || nome = :usuario;";    
    $stmt = $conn->prepare($sql1);
    $stmt->bindParam(':hashedPassword', $hashedPassword);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':Csenha', $Csenha);
    $stmt->execute();

    /* bloco 2 atualiza checksenha*/
    $sql1 = "UPDATE cadastro SET checksenha = :hashedPassword WHERE email = :usuario || nome = :usuario;";    
    $stmt = $conn->prepare($sql1);
    $stmt->bindParam(':hashedPassword', $hashedPassword);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':Csenha', $Csenha);
    $stmt->execute();

    /* bloco 3 atualiza users */
    $sql = "UPDATE users SET senha = :hashedPassword WHERE email = :usuario || login = :usuario;";    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hashedPassword', $hashedPassword);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':Csenha', $Csenha);
    $stmt->execute();
/*
    $sql = "UPDATE users SET senha = :hashedPassword WHERE email = :usuario || login = :usuario;";
    $stmt = $conn->prepare($sql);
*/
    try {
        $stmt->execute();
        echo "Senha atualizada com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar a senha: " . $e->getMessage();
    }
}

$conn->exec("SET FOREIGN_KEY_CHECKS=0");
// Fecha a conexão com o banco de dados
$conn = null;
?>

