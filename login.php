<?php
$host = '127.0.0.1';
$dbname = 'biblioteca';
$username = 'root';
$password = '';

// Conectar ao banco de dados usando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['usuario'];
        $senha = $_POST['senha'];

        // Consultar a tabela superusuario para verificar se é um admin
        $stmt = $pdo->prepare("SELECT * FROM superusuario WHERE login = :login AND senha = :senha");
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        $superusuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($superusuario) {
            // É um superusuário/administrador, redirecionar para a página de administração
            header('Location: Cancelar.php');
            exit;
        }

        // Consultar a tabela de usuários comuns para verificar o usuário e senha
        $stmt = $pdo->prepare("SELECT * FROM users WHERE login = :login AND senha = :senha");
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // É um usuário comum, redirecionar para a página principal
            header('Location: Cancelamentos.php');
            exit;
        } else {
            // Login inválido, exibir mensagem de erro
            echo "Login ou senha inválidos.";
        }
    }
} catch (PDOException $e) { // Exibir uma mensagem de erro
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}
