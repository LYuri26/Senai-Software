<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario'])) {
    // Usuário não está autenticado, redirecionar para a página de login
    header('Location: Login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista de cancelamentos</title>
    <link rel="stylesheet" href="./config/assets/estilos/consulta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>

<body>
    <a href="logout.php" class="sair">Sair</a>
    <h1>Lista de cancelamentos</h1>
    <?php
    // Definir as informações de conexão
    $host = 'localhost';
    $dbname = 'biblioteca';
    $username = 'root';
    $password = '';

    // Conectar ao banco de dados usando mysqli

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Conexão falhou" . $e->getMessage();
    }

    // buscar agendamentos no banco de dados
    $query = "SELECT * FROM cancelamentos";
    $busca = $pdo->query($query);
    $cancelamento = $busca->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do instrutor</th>
                <th>Motivo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cancelamento as $cancelamento) : ?>
                <tr>
                    <td><?php echo $cancelamento['id']; ?></td>
                    <td><?php echo $cancelamento['nome']; ?></td>
                    <td><?php echo $cancelamento['motivo']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="./config/assets/js/destruirSessao.js"></script>

</body>

</html>