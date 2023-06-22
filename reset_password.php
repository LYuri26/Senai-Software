<?php
// Conexão com o banco de dados MySQL usando PDO
$host = '127.0.0.1';
$dbname = 'biblioteca';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Falha na conexão com o banco de dados: " . $e->getMessage());
}

// Verifica se os campos foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados do formulário
    $username = $_POST["username"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Verifica se as senhas coincidem
    if ($newPassword !== $confirmPassword) {
        die("As senhas não coincidem.");
    }

    // Atualiza a senha no banco de dados
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET senha = :hashedPassword WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hashedPassword', $hashedPassword);
    $stmt->bindParam(':username', $username);

    try {
        $stmt->execute();
        echo "Senha atualizada com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar a senha: " . $e->getMessage();
    }
}

// Fecha a conexão com o banco de dados
$conn = null;
?>