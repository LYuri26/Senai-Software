<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/svg+xml" href="favicon.svg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSSlogin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>

<body>
  <div id="app">
    <h1>LOGIN</h1>
    <form action="./Cancelamento/TabelaCancelamento.php" method="post" onsubmit="exibirAlerta(event)">

      <label for="nome">E-mail / CPF / ID</label>
      <input type="text" id="nome" name="usuario" placeholder="Insira seu e-mail ou CPF ou ID" required><br><br>

      <label for="curso">Senha</label>
      <input type="text" id="id" name="senha" placeholder="Insira sua senha" required><br><br>
      <p><input type="submit" value="ACESSAR"></p>
    </form>

    <script src="agendamentoalertas.js"></script>
  </div>

</body>

</html>