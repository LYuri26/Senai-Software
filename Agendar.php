<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Agendamento de Aula</title>
    <link rel="icon" type="image/svg+xml" href="favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./config/assets/estilos/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>Agendamento de Biblioteca</title>
</head>

<body>

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
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
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
    
        // Insere os dados na tabela "agendamentos"
        $stmt = $pdo->prepare("INSERT INTO agendamentos (nome, curso, data, hora_inicio, hora_termino, quantidade_alunos) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$instrutor, $curso, $data, $hora_inicio, $hora_termino, $quantidade_alunos]);
    
        // Exibe uma mensagem de sucesso
        echo "<p>Agendamento realizado com sucesso!</p>";
    }
    ?>
    
</body>

</html>