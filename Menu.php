<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario'])) {
  // Usuário não está autenticado, redirecionar para a página de login
  header('Location: Login.php');
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
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
  <title>Menu</title>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="navbar-container">
        <img src="/config/assets/img/Logo.jpg" class="logo">
          <ul class="navbar-menu">
            <li><a href="./Agendar.php">Agendar</a></li>
            <li><a href="./Cancelar.php">Cancelar</a></li>
            <li><a href="./Agendamentos.php">Agendamentos</a></li>
            <li><a href="./Cancelamentos.php">Cancelamentos</a></li>
            <li><a href="./logout.php">Sair</a></li>
          </ul>
      </div>
      <!-- <div class="navbar-toggle">
        <span class="navbar-toggle-icon"></span>
      </div>
      </div>-->
    </nav>
  </header>
  <div class="imgscar">
    <div class="slide" role="rolebox">
      <img src="/config/assets/img/Logo.jpg" alt="Logo Senai" class="logosenai">
      <img src="/config/assets/img/Biblioteca.jpg" alt="Logo Biblioteca" class="logobib">
    </div>
  </div>
  <script src="./config/assets/js/destruirSessao.js"></script>
</body>

</html>