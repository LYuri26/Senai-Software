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
    <link rel="stylesheet" href="./config/assets/estilos/2.style_cancelamento.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>Cancelamento</title>
</head>

<body>
    <a href="logout.php" class="sair">Sair</a>

    <div id="app">
        <form action="3.relacionar.php.php" method="post" onsubmit="exibirAlerta(event)">
            <h1>CANCELAMENTO</h1>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="curso">ID / CPF</label>
            <input type="text" id="id" name="id" required><br><br>

            <label for="data">Motivo</label>
<<<<<<< Updated upstream
            <input type="text" id="data" name="motivo" required><br><br>
=======
            <input type="text" id="motivo" name="motivo" required><br><br>

            <strong>Estou ciente de que ao cancelar meu agendamento, estarei disponibilizando a data/horário para outros
                professores.</strong><br>
                <span><input type="checkbox" id="concordo" name="concordo" required></span>

                <div class="strong2">
                <strong> Eu concordo e estou ciente.</strong></div>
>>>>>>> Stashed changes

            <p>Estou ciente de que ao cancelar meu agendamento, estarei disponibilizando a data/horário para outros
                professores.</p>
            <input type="checkbox" id="concordo" name="concordo" required>
            <label for="concordo">Eu concordo e estou ciente. </label>

            <p><input type="submit" value="CANCELAR"></p>
            <button type="button" onclick="limparFormulario()">LIMPAR</button>

        </form>

        <script src="agendamentoalertas.js"></script>
        <script>
            function limparFormulario() {
                document.getElementById("nome").value = "";
                document.getElementById("id").value = "";
                document.getElementById("data").value = "";
                document.getElementById("concordo").checked = false;
            }
        </script>

    </div>

</body>

</html>