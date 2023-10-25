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
    <title>Lista de Agendamentos</title>
    <link rel="stylesheet" href="./config/assets/estilos/consulta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>

<body>
    <a href="logout.php" class="sair">Sair</a>
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

<<<<<<< Updated upstream
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
=======
            session_start();
            if (!isset($_SESSION['id_agendamento'])) {
            } else {
                // Exibir o ID de agendamento para o usuário
                $idAgendamento = $_SESSION['id_agendamento'];
                /*
                EXIBIR UMA MENSAGEM FORTE PARA INFORMAR O USUARIO QUE ELE DEVE SALVAR O ID DE AGENDAMENTO
                echo "<div class='alerta' id='alerta'>
                <p>OBRIGATÓRIO: ID DE AGENDAMENTO!</p>
                </div>";
                */
                echo "<div class='agendaID' id='agendaID'>
                <p>Seu ID de agendamento é: " . $idAgendamento . "</p>"
                    . "</div>";
                unset($_SESSION['id_agendamento']);
            }
            // Definir as informações de conexão
            $host = '127.0.0.1';
            $banco = 'u683147803_uaibookBD';
            $usuario = 'u683147803_uaibookUser';
            $senha = 'LemonPepper1';

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
            <table class="responsive-table">
                <thead>
                    <tr>

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
    </div>
    <script src="./config/assets/js/destruirSessao.js"></script>
    <footer>
        <div class="rodape">
            <p>&copy;2023 UAIBook. Todos os direitos reservados.<br>Curso de Desenvolvimento em Sistemas. Trilhas do Futuro
                II. <br>SENAI. Uberaba/MG.</p>
        </div>
    </footer>
>>>>>>> Stashed changes
</body>

</html>