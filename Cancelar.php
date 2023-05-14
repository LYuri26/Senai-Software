<!DOCTYPE html>
<html>

<head>
    <title>Cancelamento</title>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="/Agendamento/style.css">
</head>

<body>
    <h1>Cancelamento de Aula</h1>

    <form method="POST">
        <label for="ID">ID</label>
        <input type="number" id="ID" name="ID" required><br><br>

        <label for="Nome">Nome:</label>
        <input type="text" id="Nome" name="Nome" required><br>

        <br><label for="Motivo">Motivo:</label>
        <input type="text" id="Motivo" name="Motivo" required><br><br>
        <input type="submit" value="Agendar">


    </form>

    <?php
        // Definir as informações de conexão
        $host = 'localhost';
        $dbname = 'BibliotecaDB';
        $username = 'root';
        $password = '';    

            // Tenta criar uma conexão com o banco de dados
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Conexão falhou" . $e->getMessage();
    }

    // Se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os dados do formulário
        $id = $_POST['ID'];
        $nome = $_POST['Nome'];
        $motivo = $_POST['Motivo'];


        // Insere os dados na tabela "agendamentos"
        $stmt = $pdo->prepare("INSERT INTO cancelamentos (id, nome, motivo) VALUES (?, ?, ?)");
        $stmt->execute([$id, $nome, $motivo]);

        // Exibe uma mensagem de sucesso
        echo "<p>Agendamento realizado com sucesso!</p>";
    }
    ?>

</body>

</html>