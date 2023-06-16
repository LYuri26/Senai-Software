<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['usuario'])) {
  // Usuário não está autenticado, redirecionar para a página de login
  header('Location: login.php');
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
  <title>Menu</title>
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="navbar-container">
        <img src="/config/assets/img/Logo.png" class="logo">
        <ul class="navbar-menu">
          <li><a href="./agendar.php">Agendar</a></li>
          <li><a href="./cancelar.php">Cancelar</a></li>
          <li><a href="./agendamentos.php">Agendamentos</a></li>
          <li><a href="./cancelamentos.php">Cancelamentos</a></li>
          <li><a href="./logout.php">Sair</a></li>
        </ul>
      </div>
      <!-- <div class="navbar-toggle">
        <span class="navbar-toggle-icon"></span>
      </div>
      </div>-->
    </nav>
  </header>
  <div class="container" id="slider">
    <div class="imgscar"id="slider">
      <div class="slide" role="rolebox"id="slider">
        <img src="/config/assets/img/Logo.png" alt="Logo Senai" class="selected">
        <img src="/config/assets/img/Biblioteca.jpg" alt="Logo Biblioteca" class="logobib">
        <!--<img src="/config/assets/img/img2.png" alt="imagem2" class="IMG.2">-->
      </div>
    </div>
  </div>
  <script src="./config/assets/js/menu.js"></script>
  <h1>Bem-vindo ao UAIBook!</h1>

  <p>O UAIBook é a melhor ferramenta que você, aluno, pode escolher para obter facilidade e bem-estar ao realizar a reserva de um horário na biblioteca!</p>
  <p>Com o UAIBook, agendar o horário desejado na biblioteca nunca foi tão fácil e livre de complicações. Desfrute de uma experiência tranquila e eficiente ao realizar suas reservas sem preocupações.</p>
  <p id="linhatexto">Nosso objetivo é proporcionar a melhor experiência possível para aqueles que buscam um futuro brilhante através da utilização desse espaço valioso. O site foi desenvolvido com carinho e dedicação pelos talentosos alunos da turma de Desenvolvimento de Sistemas.</p>
 <!-- <script src="./config/assets/js/destruirSessao.js"></script> -->
  <footer>
    <div class="rodape">
      <strong>&copy; 2023 UAIBook. Todos os direitos reservados.
        Curso de Desenvolvimento de Sistemas, Uberaba/MG, SENAI</strong>

    </div>
  </footer>
</body>

</html>