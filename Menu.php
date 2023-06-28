<?php
require_once './session.php';

/*
if (!(isset($_SESSION['usuario']) || isset($_SESSION['superusuario']))) {
  header("Location: login.html"); 
  exit;
}
if ((isset($_SESSION['usuario']) || isset($_SESSION['superusuario']))) {
  header("Location: menu.php"); 
  exit;
}
/* INCLUDE ONCE SERVE PARA INCLUIR O ARQUIVO APENAS UMA VEZ, OU SEJA, SE O ARQUIVO JÁ FOI INCLUÍDO ANTES, ELE NÃO SERÁ INCLUÍDO NOVAMENTE.
require_once './session.php';


/* TAMBÉM NÃO É NECESSÁRIO NESTE CASO 
Verificar se há uma sessão de usuário ou superusuário 
if (!(isset($_SESSION['usuario']) || isset($_SESSION['superusuario']))) { 
    // Redirecionar para a página de login 
    header("Location: login.html"); 
    exit;
}

$_SESSION['user_id'] = $usuario['id']; // Armazena o ID do usuário na sessão
$_SESSION['privilegios'] = $usuario['privilegios']; // Armazena os privilégios do usuário na sessão

Definir a mensagem na variável de sessão
$_SESSION['login_message'] = 'Para cancelar um agendamento, por favor, faça login novamente!';*/

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
  <link rel="icon" href="./config/assets/img/linguicao.ico" type="image/x-icon">
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="navbar-container">
        <a href="./menu.php">
          <img src="./config/assets/img/senailogo1.png" class="logo" href="./menu.php">
        </a>
        <ul class="navbar-menu">
          <li><a href="./agendar.php">Agendar</a></li>
          <li><a href="./cancelar.php">Cancelar</a></li>
          <li><a href="./cancelamentos.php">Cancelamentos</a></li>
          <li><a href="./Agendamentos.php">Agendamentos</a></li>
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
    <div class="imgscar" id="slider">
      <div class="slide" role="rolebox" id="slider">
        <img src="./config/assets/img/senailogo1.png" Logo Senai" class="selected">
        <img src="./config/assets/img/Biblioteca.jpg" alt="Logo Biblioteca" class="logobib">
        <!--<img src="/config/assets/img/img2.png" alt="imagem2" class="IMG.2">-->
      </div>
    </div>
  </div>
  <script src="./config/assets/js/menu.js"></script>
  <h1>Bem-vindo ao UAIBook!</h1>
  <div class="container" id="conteudo">
    <p>O UAIBook é a melhor ferramenta que você, aluno, pode escolher para obter facilidade e bem-estar ao realizar a reserva de um horário na biblioteca!</p>
    <p>Com o UAIBook, agendar o horário desejado na biblioteca nunca foi tão fácil e livre de complicações. Desfrute de uma experiência tranquila e eficiente ao realizar suas reservas sem preocupações.</p>
    <p id="linhatexto">Nosso objetivo é proporcionar a melhor experiência possível para aqueles que buscam um futuro brilhante através da utilização desse espaço valioso. O site foi desenvolvido com carinho e dedicação pelos talentosos alunos da turma de Desenvolvimento de Sistemas.</p>
  </div>
  <!-- <script src="./config/assets/js/destruirSessao.js"></script> -->
  <script src="./config/assets/js/destruirSessao.js"></script>
  <!-- Assim que o usuário acessar o menu, o js sera executado, executao/linkando também as tabelas. -->
  <script src="./config/assets/js/linkdb.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <footer>
    <div class="rodape">
      <p>&copy;2023 UAIBook. Todos os direitos reservados.<br>Curso de Desenvolvimento em Sistemas. Trilhas do
        Futuro II. <br>SENAI. Uberaba/MG.</p>
    </div>
  </footer>
</body>

</html>
<!--
  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
     cabeçalho omitido por brevidade 
    <style>
      footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        padding: 10px;
        text-align: center;
      }
    </style>
  </head>

  <body>
    <div id="app">
      formulário omitido por brevidade 
    </div>

    <footer>
      <div class="rodape">
        <strong>&copy; 2023 UAIBook. Todos os direitos reservados.
          Curso de Desenvolvimento em Sistemas.Trilhas do Futuro II. SENAI. Uberaba/MG.</strong>
      </div>
    </footer>

    <script>
      // scripts omitidos por brevidade
    </script>
  </body>

  </html>
    -->