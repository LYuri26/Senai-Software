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
  <div class="container">
  <div class="imgscar">
    <div class="slide" role="rolebox">
      <img src="/config/assets/img/Logo.png" alt="Logo Senai" class="logosenai">
      <img src="/config/assets/img/Biblioteca.jpg" alt="Logo Biblioteca" class="logobib">
      <img src="/config/assets/img/img2.png" alt="imagem2" class="IMG.2">
    </div>
  </div>
</div>
<h1>Bem-vindo ao UAIBook!</h1>
<p>O UAIBook é a melhor ferramenta que você aluno pode escolher para obter facilidade e bem-estar ao realizar a reserva de um horário na biblioteca! Por meio do UAIBook você não terá dificuldades ao realizar o agendamento do horário desejado, nem terá problemas com sua reserva. O intuito é levar a melhor experiência para aqueles que buscam um futuro brilhante por meio da utilização do espaço. Site desenvolvido com muito carinho e dedicação pelos alunos da turma de desenvolvimento de sistemas.</p>
  <script src="./config/assets/js/destruirSessao.js"></script>
  <footer>
  <div class="rodape">
    <p>&copy; 2023 UAIBook. Todos os direitos reservados.
      Curso de Desenvolvimento de Sistemas, Uberaba/MG, SENAI</p>

  </div>
</footer>
</body>

</html> 