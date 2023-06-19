<?php
session_start();

// Verificar se há uma sessão de usuário ou superusuário 
if (!(isset($_SESSION['usuario']) || isset($_SESSION['superusuario']))) { 
    // Redirecionar para a página de login 
    header("Location: login.html"); 
    exit;
}
/*<?php
session_start();
if (!isset($_SESSION['usuario'])) { 
    // redireciona o usuário para a página de login
    header("Location: Login.html"); 
    exit;
}
$_SESSION['user_id'] = $usuario['id']; // Armazena o ID do usuário na sessão
$_SESSION['privilegios'] = $usuario['privilegios']; // Armazena os privilégios do usuário na sessão
?>*/
?>
