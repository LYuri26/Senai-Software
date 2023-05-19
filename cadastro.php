<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/ico" href="config/assets/img/baixar.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./config/assets/estilos/cadastro.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap"
    rel="stylesheet">
  <title>Formulário de Cadastro</title>
</head>

<body>

<div id="app">

        <form id="forms" method="post" action="cadastro.php">
        
        <h2>CADASTRO</h2>
            
            <label for="nome">Nome</label>  
            <input type="text" maxlength="100" name="nome" id="nome" placeholder="Nome completo" required><br><br>

            <label for="Código de acesso">Código de acesso</label>  
            <input type="number" maxlength="8" name="Código de acesso" id="Código de acesso" placeholder="Código de acesso" required><br><br>

            <label for="email">E-mail institucional</label>  
            <input type="email" maxlength="80" name="email" id="email" placeholder="Digite seu e-mail institucional" required><br><br>

            <label for="senha">Digite sua senha</label>  
            <input type="password" maxlength="8" name="senha" id="senha" placeholder="Digite sua senha" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite sua senha'" style="text-align: left;"><br><br>

            <label for="confirmar senha">Confirmar senha</label>  
            <input type="password" maxlength="8" name="confirmar senha" id="confirmar senha" placeholder="Confirme sua senha" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirme sua senha'" style="text-align: left;"><br><br>

            <div class="button-container">
            <button type="submit" value="CADASTRAR">CADASTRAR</div>
            
      <div class="button-container">
        <button type="button" id="botao_limpar" onclick="limparFormulario()" class="limpar-button">LIMPAR
          FORMULÁRIO</button>
        </div>
    </form>

    <footer>
    <div class="rodape">
    <p>&copy;2023 UAIBook! todos os direitos reservados.</p>
    <p>Curso de Desenvolvimento de Sistemas, Uberaba/MG, SENAI.</p>
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

</html>
