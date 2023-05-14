<!DOCTYPE html>
<html>

<head>
    <title>Lista de Agendamentos</title>
    <link rel="stylesheet" href="./config/assets/estilos/consulta.css">
</head>

<body>
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
</html>