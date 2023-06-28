
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
    <meta charset="UTF-8">
<<<<<<< Updated upstream
    <title>Agendamento de Aula</title>
    <link rel="icon" type="image/svg+xml" href="favicon.svg" />
=======
    <title>Agendar</title>
<<<<<<< Updated upstream
    <link rel="icon" href="config/assets/img/joao.png" type="image/x-icon">
>>>>>>> Stashed changes
=======
    <link rel="icon" href="./config/assets/img/senai-icon.ico" type="image/x-icon">
>>>>>>> Stashed changes
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./config/assets/estilos/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>Agendamento de Biblioteca</title>
</head>

<body>
    <a href="logout.php" class="sair">Sair</a>

    <form method="POST">
        <h1>AGENDAMENTO</h1>
        <label for="instrutor">Instrutor</label>
        <input type="text" id="instrutor" name="instrutor" required><br><br>

        <label for="curso">Curso</label>
        <input type="text" id="curso" name="curso" required><br><br>

        <label for="data">Data</label>
        <input type="date" id="data" name="data" required><br><br>

        <label for="hora_inicio">Início</label>
        <input type="time" id="hora_inicio" name="hora_inicio" required><br><br>

        <label for="hora_termino">Término</label>
        <input type="time" id="hora_termino" name="hora_termino" required><br><br>

        <label for="quantidade_alunos">Quantidade de Alunos</label>
        <input type="number" id="quantidade_alunos" name="quantidade_alunos" required><br><br>

        <input type="submit" value="AGENDAR">
    </form>
    <?php
<<<<<<< Updated upstream
    // Tenta criar uma conexão com o banco de dados
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        die();
    }
=======
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
    /* datas */

    function isWeekend($date)
    {
        $timestamp = strtotime($date);
        $weekday = date('N', $timestamp);
        return ($weekday == 6 || $weekday == 7);
    }

    function isHoliday($date)
    {
        $apiUrl = "https://api.calendario.com.br/?json=true&ano=" . date('Y') . "&estado=SP&cidade=Sao_Paulo&token=SEU_TOKEN";
        // Substitua SEU_TOKEN pelo token fornecido pela API Calendário Brasileiro

        $response = file_get_contents($apiUrl);
        $holidays = json_decode($response, true);

        return isset($holidays[$date]);
    }

    function isValidTime($dayOfWeek, $time)
    {
        $validTimes = [
            1 => ['13:00', '21:00'], // Segunda-feira
            2 => ['08:00', '17:00'], // Terça-feira
            3 => ['13:00', '21:00'], // Quarta-feira
            4 => ['13:00', '21:00'], // Quinta-feira
            5 => ['08:00', '17:00'], // Sexta-feira
        ];

        $start = $validTimes[$dayOfWeek][0];
        $end = $validTimes[$dayOfWeek][1];

        return ($time >= $start && $time <= $end);
    }

    // Restante do código...
>>>>>>> Stashed changes

    // Se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os dados do formulário
        $instrutor = $_POST['instrutor'];
        $curso = $_POST['curso'];
        $data = $_POST['data'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_termino = $_POST['hora_termino'];
        $quantidade_alunos = $_POST['quantidade_alunos'];

<<<<<<< Updated upstream
        // Insere os dados na tabela "agendamentos"
        $stmt = $pdo->prepare("INSERT INTO agendamentos (nome, curso, data, hora_inicio, hora_termino, quantidade_alunos) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$instrutor, $curso, $data, $hora_inicio, $hora_termino, $quantidade_alunos]);
=======
        // Verificar se o número de alunos é válido (não negativo)
        if ($quantidade_alunos < 0) {
        echo "<div class='error-message' style='color: red; text-align: center; font-size:20px; font-weight:600; margin: 1rem;'>Não é possível agendar com número negativo de alunos.</div>";
        exit;
    }

        // Verificar se já existe um agendamento para essa data e hora no banco de dados
        $stmt = $pdo->prepare("
        SELECT COUNT(*) FROM agendamentos
        WHERE data = :data AND (
        (hora_inicio <= :hora_inicio AND hora_termino > :hora_inicio) OR
        (hora_inicio < :hora_termino AND hora_termino >= :hora_termino)
        )
        ");
        $stmt->bindValue(':data', $data);
        $stmt->bindValue(':hora_inicio', $hora_inicio);
        $stmt->bindValue(':hora_termino', $hora_termino);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            /*$_SESSION['error_message'] = "Já existe um agendamento neste horário!";*/
            // Exibir uma mensagem de erro se já existe um agendamento para essa data e hora
            echo "<div class='error-message' style='color: yellow; text-align: center; font-size:20px; font-weight:600;margin: 1rem;'>Já existe um agendamento neste horário!</div>";
>>>>>>> Stashed changes

        // Exibe uma mensagem de sucesso
        echo "<p>Agendamento realizado com sucesso!</p>";
    }
    ?>

</body>

</html>