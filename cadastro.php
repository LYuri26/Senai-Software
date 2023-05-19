<!DOCTYPE html>
<html>

<head>
    <title>Formulário de Cadastro</title>
</head>

<body>
    <link rel="stylesheet" href="./config/assets/estilos/cadastro.css">

    <form id="forms" method="post" action="cadastro.php">
        <h2>Cadastro</h2>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br><br>

        <label for="Código de acesso">Código de acesso:</label>
        <input type="number" name="Código de acesso" ID="Código de acesso" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br><br>

        <label for="confirmar senha">confirmar senha:</label>
        <input type="password" name="confirmar senha" id="confirmar senha" required><br><br>

        <div class="button-container">
            <input type="submit" value="Cadastrar">

            <div class="button-container">
                <button type="button" id="botao_limpar" onclick="limparFormulario()" class="limpar-button">LIMPAR
                    FORMULÁRIO</button>
            </div>
    </form>
    </div>
    </footer>
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