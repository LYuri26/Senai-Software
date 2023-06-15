<?php
session_start();
$host = '127.0.0.1';
$dbname = 'biblioteca';
$username = 'root';
$password = '';

// Conectar ao banco de dados usando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*$loginAdmin = "admin"; // Substitua pelo valor desejado
    $senhaAdmin = 'fixfixfix'; // Substitua 'senha_admin' pela senha do superusuário

    // Gerar o hash da senha
    $senhaHash = password_hash($senhaAdmin, PASSWORD_DEFAULT);

    // Armazenar o hash da senha no banco de dados
    $stmt = $pdo->prepare("INSERT INTO superusuario (login, senha) VALUES (:login, :senha)");
    $stmt->bindValue(':login', $loginAdmin);
    $stmt->bindValue(':senha', $senhaHash);
    $stmt->execute();*/

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['usuario'];
        $senha = $_POST['senha'];

        // Consultar a tabela superusuario para verificar se é um admin
        $stmt = $pdo->prepare("SELECT * FROM superusuario WHERE login = :login AND senha = :senha");
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        $superusuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($superusuario) {
            // É um superusuário/administrador, armazenar os dados na sessão
            $_SESSION['usuario'] = $superusuario;
            // É um superusuário/administrador, redirecionar para a página de administração
            header('Location: menu.php');
            exit;
        }

        // Consultar a tabela de usuários comuns para verificar o usuário e senha
        $stmt = $pdo->prepare("SELECT * FROM users WHERE login = :login AND senha = :senha");
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', $senha);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // É um usuário comum, armazenar os dados na sessão
            $_SESSION['usuario'] = $usuario;
            // É um usuário comum, redirecionar para a página principal
            header('Location: menu.php');
            exit;
        } else {
            header('Location: login.html');
            // Login inválido, exibir mensagem de erro
            echo "Login ou senha inválidos.";
        }
    }
} catch (PDOException $e) { // Exibir uma mensagem de erro
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}
?>
<<<<<<< Updated upstream
=======
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/ico" href="config/assets/img/baixar.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="config/assets/estilos/login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
  <title>Login</title>
  <div class="logosenai">
    <img src="config/assets/img/senai-logo-0 (1).png">
</div>
</head>

<body>

  <div id="app">

    <form id="forms" action="./conexaologin.php" method="post" onsubmit="exibirAlerta(event)">

      <div class="link-container">
  
</div>


        <a href="cadastro.php" class="link-button1">CRIAR CADASTRO</a>
      </div>
      <img src="config/assets/img/senai-logo-0 (1).png">
      <h1>LOGIN</h1>

      <label for="nome"></label>
      <input type="text" maxlength="42" id="nome" name="usuario" placeholder="Digite seu E-mail / CPF / ID" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite seu E-mail / CPF / ID'" style="text-align: left;"><br>

      <label for="curso"></label>
      <input type="password" minlength="8" maxlength="62" id="senha" name="senha" placeholder="Digite sua senha" required onfocus="this.placeholder = ''" onblur="this.placeholder = 'Digite seu E-mail / CPF / ID'" style="text-align: left;">

      <div class="link-container">
        <a href="passwrecovery.php" class="link-button2">RECUPERAR SENHA</a>
      </div>

      <div class="button-container">
        <button type="submit" value="ACESSAR">ACESSAR</button>

        <button type="button" id="botao_limpar" onclick="limparFormulario()" class="limpar-button">LIMPAR FORMULÁRIO</button>

      </div>

  </div>
  </form>
  <?php
  if (isset($_GET['error']) && $_GET['error'] == '1001') {
    echo "<div class='failed' style='text-align: center; font-size:20px; font-weight:600;'>Login ou senha inválidos.</div>";
  }
  ?>
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

    function clearPlaceholder(element) {
      element.placeholder = '';
    }

    function resetPlaceholder(element) {
      element.placeholder = 'Digite seu E-mail / CPF / ID';
    }
  </script>
  <script src="./config/assets/js/destruirSessao.js"></script>
  <script src="./config/assets/js/default.js"></script>
  <footer>
    <div class="rodape">
      <p>&copy; 2023 UAIBook. Todos os direitos reservados.</p>
      <p>Curso de Desenvolvimento de Sistemas, Uberaba/MG, SENAI</p>
    </div>
  </footer>
</body>



</html>
>>>>>>> Stashed changes
