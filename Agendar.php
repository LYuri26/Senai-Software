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
    <title>Agendamento de Aula</title>
    <link rel="icon" type="image/svg+xml" href="favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./config/assets/estilos/agendar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
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

    // Tenta criar uma conexão com o banco de dados
    $host = '127.0.0.1';
    $banco = 'u683147803_uaibookBD';
    $usuario = 'u683147803_uaibookUser';
    $senha = 'LemonPepper1';
    try {
<<<<<<< Updated upstream
        $pdo = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
=======
        $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4", $usuario, $senha);
>>>>>>> Stashed changes
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        die();
    }

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
        // Exibe uma mensagem de sucesso
        //echo "<p>Agendamento realizado com sucesso!</p>";
=======

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

            // Insere os dados na tabela "agendamentos"
        }

        if (isWeekend($data) || isHoliday($data)) {
            echo "<div class='error-message' style='color: red; text-align: center; font-size:20px; font-weight:600; margin: 1rem;'>Não é possível agendar nos sábados e domingos.</div>";
        } else {
            // Verificar se é um dia útil e horário válido
            $dayOfWeek = date('N', strtotime($data));
            if (isValidTime($dayOfWeek, $hora_inicio)) {
                $Id_bytes = 5;
                $resultado_bytes = random_bytes($Id_bytes);
                $id_agendamento  = strtoupper(bin2hex(random_bytes(4)));
                $_SESSION['id_agendamento'] = $id_agendamento;

                // Insere os dados na tabela "agendamentos"
                $stmt = $pdo->prepare("INSERT INTO agendamentos (nome, curso, data, hora_inicio, hora_termino, quantidade_alunos, id_agendamento) VALUES (:nome, :curso, :data, :hora_inicio, :hora_termino, :quantidade_alunos, :id_agendamento)");
                $stmt->bindValue(':nome', $nome);
                $stmt->bindValue(':curso', $curso);
                $stmt->bindValue(':data', $data);
                $stmt->bindValue(':hora_inicio', $hora_inicio);
                $stmt->bindValue(':hora_termino', $hora_termino);
                $stmt->bindValue(':quantidade_alunos', $quantidade_alunos);
                $stmt->bindValue(':id_agendamento', $_SESSION['id_agendamento']);
                /* $stmt->bindValue(':id_agendamento', $id_agendamento);*/
                $stmt->execute();
                $cadastroId = $pdo->lastInsertId();

                // Exibe uma mensagem de sucesso
                //echo "<div class='success-message' style='text-align: center; color: green; font-size:20px; margin: 1rem;'>Agendamento realizado com sucesso!</div>";
                //session_destroy();
                echo "<div class='success-message' style='color: green; text-align: center; font-size:20px; font-weight:600; margin: 1rem;'>Agendamento realizado com sucesso!</div> <p style='color: black; text-align: center; font-size:20px; font-weight:600;'>ID do agendamento: " . $resultado_final . "</p>";
                echo "<script>window.location.href = 'agendamentos.php'</script>;";
                header("Location: agendamentos.php");

                /*echo "<script> alert('Agendado com sucesso!') </script>";*/
                // Agendamento válido, continuar com o código existente para inserir no banco de dados
                // ...
            } else {
                echo "<div class='error-message' style='color: orange; text-align: center; font-size:20px; font-weight:600; margin: 1rem;'>Não foi possível agendar.</div>";
            }
        }
>>>>>>> Stashed changes
    }
    ?>
</body>

</html>