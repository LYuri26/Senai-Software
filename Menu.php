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
<html lang="pt-br">

<head>
  <link rel="stylesheet" href="./config/assets/estilos/menu.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu</title>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="navbar-container">
<<<<<<< Updated upstream
        <div class="navbar-logo" id="icone">
          <a><img src="./config/assets/img/Logo.jpg" class="logo"></a>
        </div>
=======
        <img src="/config/assets/img/senai-logo-0 (1).png" class="logo">
>>>>>>> Stashed changes
        <ul class="navbar-menu">
          <li><a href="/Agendar.php">Agendar</a></li>
          <li><a href="/Cancelar.php">Cancelar</a></li>
          <li><a href="/Agendamentos.php"> Agendamentos</a></li>
          <li><a href="/Cancelamentos.php"> Cancelamentos</a></li>
          <li><a href="./Login.html">Sair</a></li>
        </ul>
        <div class="navbar-toggle">
          <span class="navbar-toggle-icon"></span>
        </div>
      </div>
    </nav>
  </header>
  <div class="imagem-biblioteca">
    <img src="./config/assets/img/Biblioteca.jpg" class="imagem">
  </div>

</body>

</html>