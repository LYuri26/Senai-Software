<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario'])) {
    // Usuário não está autenticado, redirecionar para a página de login
    header('Location: login.html');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
<<<<<<< Updated upstream
    <title>Lista de Agendamentos</title>
=======
    <title>Lista de agendamentos</title>
    <link rel="icon" href="config/assets/img/joao.png" type="image/x-icon">
>>>>>>> Stashed changes
    <link rel="stylesheet" href="./config/assets/estilos/consulta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>

<body>
    <a href="logout.php" class="sair">Sair</a>

    <div id="app">
        <form action="3.relacionar.php.php" method="post" onsubmit="exibirAlerta(event)">
    <h1>Lista de Agendamentos</h1>
    <?php
    // Definir as informações de conexão
    $host = 'localhost';
    $banco = 'biblioteca';
    $usuario = 'root';
    $senha = '';

    // Conectar ao banco de dados usando mysqli

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4", $usuario, $senha);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Conexão falhou" . $e->getMessage();
    }

    // buscar agendamentos no banco de dados
    $query = "SELECT * FROM agendamentos";
    $busca = $pdo->query($query);
    $agendamentos = $busca->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data</th>
                <th>Hora de Início</th>
                <th>Hora de Término</th>
                <th>Quantidade de Alunos</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agendamentos as $agendamento) : ?>
                <tr>
                    <td><?php echo $agendamento['id']; ?></td>
                    <td><?php echo $agendamento['nome']; ?></td>
                    <td><?php echo $agendamento['data']; ?></td>
                    <td><?php echo $agendamento['hora_inicio']; ?></td>
                    <td><?php echo $agendamento['hora_termino']; ?></td>
                    <td><?php echo $agendamento['quantidade_alunos']; ?></td>
                    <td><?php echo $agendamento['curso']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

<footer>
    <div class="rodape">
        <p>&copy;2023 UAIBook. Todos os direitos reservados.</p>
        <p>Curso de Desenvolvimento em Sistemas.Trilhas do Futuro II. SENAI. Uberaba/MG.</p>
    </div>
</footer>

</html>