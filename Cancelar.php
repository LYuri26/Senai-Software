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
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./config/assets/estilos/cancelar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>Cancelamento</title>
</head>

<body>
    <a href="logout.php" class="sair">Sair</a>

    <div id="app">
        <form method="post" onsubmit="exibirAlerta(event)">
            <h1>CANCELAMENTO</h1>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="curso">ID / CPF</label>
            <input type="text" id="id" name="id" required><br><br>

            <label for="data">Motivo</label>
            <input type="text" id="motivo" name="motivo" required><br><br>

            <strong>Estou ciente de que ao cancelar meu agendamento, estarei disponibilizando a data/horário para outros
                professores.<br>Eu concordo e estou ciente.</strong>
            <span><input type="checkbox" id="concordo" name="concordo" required></span>


            <p><input type="submit" value="CANCELAR"></p>
            <button type="button" onclick="limparFormulario()">LIMPAR</button>


        </form>

        <script src="./config/assets/js/destruirSessao.js"></script>
        <script>
            function limparFormulario() {
                document.getElementById("nome").value = "";
                document.getElementById("id").value = "";
                document.getElementById("motivo").value = "";
                document.getElementById("concordo").checked = false;
            }
        </script>
        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtém os dados do formulário
            $instrutor = $_POST['nome'];
            $curso = $_POST['id'];
            $data = $_POST['motivo'];
            // Exibe uma mensagem de sucesso
            echo "<div class='success-message'>Cancelamento realizado com sucesso!</div>";
        }
        ?>
        <div class="content-wrapper">

        </div>
        <footer>
            <div class="rodape">
                <strong>&copy; 2023 UAIBook. Todos os direitos reservados.</strong>
                <strong>Curso de Desenvolvimento em Sistemas. Trilhas do Futuro II. SENAI. Uberaba/MG.</strong>
            </div>
        </footer>


    </div>

</body>

</html>