<?php
/*
usado para sempre verificar a sessão do usuário
require_once './session.php';

// Verificar se há uma sessão de usuário ou superusuário 
if (!(isset($_SESSION['usuario']) || isset($_SESSION['superusuario']))) { 
    // Redirecionar para a página de login 
    header("Location: login.html"); 
    exit;
}
*/
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista de cancelamentos</title>
    <link rel="stylesheet" href="./config/assets/estilos/consulta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="icon" href="config/assets/img/senai-icon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-container">
                <a href="./menu.php">
                    <img src="./config/assets/img/senailogo1.png" class="logo">
                </a>
                <ul class="navbar-menu">
                    <li><a href="./agendar.php">Agendar</a></li>
                    <li><a href="./cancelar.php">Cancelar</a></li>
                    <li><a href="./Agendamentos.php">Agendamentos</a></li>
                    <li><a href="./menu.php">Menu</a></li>
                    <li><a href="./logout.php">Sair</a></li>
                </ul>
            </div>
            <!-- <div class="navbar-toggle">
        <span class="navbar-toggle-icon"></span>
      </div>
      </div>-->
        </nav>
    </header>
    <a href="./logout.php" class="sair">Sair</a>

    <div id="app">
        <form action="./conexao.php" method="post" onsubmit="exibirAlerta(event)">
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
                        <th>Nome do instrutor</th>
                        <th>Motivo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cancelamento as $cancelamento) : ?>
                        <tr>
                            <td><?php echo $cancelamento['nome']; ?></td>
                            <td><?php echo $cancelamento['motivo']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </DIV>
</body>
<script src="./config/assets/js/destruirSessao.js"></script>
<footer>
    <div class="rodape">
        <p>&copy;2023 UAIBook. Todos os direitos reservados.</p>
        <p>Curso de Desenvolvimento em Sistemas.Trilhas do Futuro II. SENAI. Uberaba/MG.</p>
    </div>
</footer>

</html>