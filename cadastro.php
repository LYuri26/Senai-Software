<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/ico" href="config/assets/img/baixar.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./config/assets/estilos/cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <title>Formulário de Cadastro</title>
    <div class="logosenai">
    <img src="config/assets/img/senai-logo-0 (1).png">
</div>
</head>

<body>
    <div id="app">
        <form id="forms" action="./conexaocadastro.php" method="post">
            <h2>Cadastro</h2>
            <label for="nome">Nome:</label>
            <input type="text" maxlength="42" name="nome" id="nome" required><br><br>

            <label for="Código de acesso">Código de acesso:</label>
            <input type="text" name="codigo" ID="codigo" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br><br>

            <label for="senha">Senha:</label>
            <input type="password" minlength="8" name="senha" id="senha" required><br><br>

            <label for="confirmar senha">Confirmar senha:</label>
            <input type="password" minlength="8" maxlength="62" name="confirmarsenha" id="confirmarsenha" required><br><br>

            <div class="button-container">
                <input type="submit" value="CADASTRAR">

                <div class="button-container">
                    <button type="button" id="botao_limpar" onclick="limparFormulario()" class="limpar-button">Limpar Formulário</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        function limparFormulario() {
            document.getElementById("forms").reset();

            // Limpar manualmente os campos de texto
            var dados = document.querySelectorAll('#forms input[type="text"]');
            for (var i = 0; i < dados.length; i++) {
                dados[i].value = '';
            }
        }
    </script>
</body>
<footer>
    <div class="rodape">
        <p>&copy; 2023 UAIBook. Todos os direitos reservados.</p>
        <p>Curso de Desenvolvimento de Sistemas, Uberaba/MG, SENAI.</p>
    </div>
</footer>

</html>