<!DOCTYPE html>
<html>

<head>
    <title>Lista de cancelamentos</title>
    <link rel="stylesheet" href="/Consulta/consulta.css">
</head>

<body>
    <h1>Lista de cancelamentos</h1>
    <?php
    // Definir as informações de conexão
    $host = 'localhost';
    $dbname = 'BibliotecaDB';
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
            <?php foreach ($cancelamento as $cancelamento): ?>
                <tr>
                    <td><?php echo $cancelamento['id']; ?></td>
                    <td><?php echo $cancelamento['nome']; ?></td>
                    <td><?php echo $cancelamento['motivo']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>