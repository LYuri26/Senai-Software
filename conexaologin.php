<?php
session_start();
$host = '127.0.0.1';
$dbname = 'biblioteca';
$username = 'root';
$password = '';

// Conectar ao banco de dados usando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*Resto do seu código...
    $loginAdmin = "admin"; // Substitua pelo valor desejado
    $senhaAdmin = 'fixfixfix'; // Substitua 'senha_admin' pela senha do superusuário

    // Gerar o hash da senha
    $senhaHash = password_hash($senhaAdmin, PASSWORD_DEFAULT);

    // Armazenar o hash da senha no banco de dados
    $stmt = $pdo->prepare("INSERT INTO superusuario (login, senha) VALUES (:login, :senha)");
    $stmt->bindValue(':login', $loginAdmin);
    $stmt->bindValue(':senha', $senhaHash);
    $stmt->execute();
*/

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['usuario'];
        $senha = $_POST['senha'];

        // admin
        $consultasuper = "SELECT * FROM superusuario WHERE login = :login";
        $stmt = $pdo->prepare($consultasuper);
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $resconsultasuper = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resconsultasuper && password_verify($senha, $resconsultasuper['senha'])) {
            // É um superusuário/administrador, armazenar os dados na sessão
            $_SESSION['usuario'] = $resconsultasuper;
            // Redirecionar para a página de administração
            header('Location: Menu.php');
            exit;
        }

        $stmt = $pdo->prepare("SELECT * FROM superusuario WHERE login = :login AND senha = :senha");
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        $superusuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($superusuario) {
            // É um superusuário/administrador, armazenar os dados na sessão
            $_SESSION['usuario'] = $superusuario;
            // É um superusuário/administrador, redirecionar para a página de administração
            header('Location: Menu.php');
            exit;
        }

        //users
        $stmt = $pdo->prepare("SELECT * FROM users WHERE login = :login AND senha = :senha");
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // É um usuário comum, armazenar os dados na sessão
            $_SESSION['usuario'] = $usuario;
            // É um usuário comum, redirecionar para a página principal
            header('Location: Menu.php');
            exit;
        }
        // Verificar se é um usuário comum
        $consultauser = "SELECT * FROM users WHERE login = :login";
        $stmt = $pdo->prepare($consultauser);
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $resconsultauser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resconsultauser && password_verify($senha, $resconsultauser['senha'])) {
            // É um usuário comum, armazenar os dados na sessão
            $_SESSION['usuario'] = $resconsultauser;
            // Redirecionar para a página principal
            header('Location: Menu.php');
            exit;
        }

        // Credenciais inválidas, redirecionar para login.php com mensagem de erro
        header('Location: Login.php?error=1001');
        exit;
    }
} catch (PDOException $e) {
    // Tratar exceções de conexão com o banco de dados aqui, se necessário
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    exit;
}
?>