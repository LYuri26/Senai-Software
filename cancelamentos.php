<?php
require_once './session.php';

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
    <meta charset="UTF-8">
    <title>Lista de cancelamentos</title>
    <!-- Importante deixarmos a codificação dos caracteres e o título no início de <head> para otimização e procura da página -->

    <!-- meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="robots" content="index, nofollow">
    <meta name="googlebot" content="index, nofollow">
    <meta name="googlebot" content="notranslate">
    <meta name="theme-color" content="#FFFFFF">
    <meta name="description" content="Consulta biblioteca SENAI">
    <meta name="keywords" content="SENAI, Biblioteca, cancelar">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="author" content="SENAI">

    <!-- link tags -->
    <link rel="stylesheet" href="./config/assets/estilos/consulta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="icon" href="./config/assets/img/senai.ico" type="image/x-icon">

</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-container">
                <div class="navbar-logo">
                    <a href="./menu.php">
                        <img src="./config/assets/img/senailogo2.png" class="logo" href="./menu.php">
                </div>
                <a href="#" id="menu-icon">
                    <i class="fas fa-bars fa-2x"></i>
                </a>
                <ul class="navbar-menu" id="menu-list">
                    <li><a href="./agendar.php">Agendar</a></li>
                    <li><a href="./cancelar.php">Cancelar</a></li>
                    <li><a href="./agendamentos.php">Agendamentos</a></li>
                    <li><a href="./menu.php">Menu</a></li>
                    <li class="botaosair"><a id="botaosair" href="./logout.php">Sair</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div id="app">
        <form action="./conexao.php" method="post" onsubmit="exibirAlerta(event)">
            <h1>Lista de cancelamentos</h1>
            <?php
            // Definir as informações de conexão
            $host = '127.0.0.1';
            $dbname = 'u683147803_uaibookBD';
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
            <div class="table-container">

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
            </div>
    </div>
</body>
<script src="./config/assets/js/destruirSessao.js"></script>
<footer>
    <div class="rodape">
        <p>&copy;2023 UAIBook. Todos os direitos reservados.<br>Curso de Desenvolvimento em Sistemas. Trilhas do Futuro
            II. <br>SENAI. Uberaba/MG.</p>
    </div>
</footer>

</html>