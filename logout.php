<?php
session_start(); // Inicie a sessão, se ainda não estiver iniciada

// Limpe todas as variáveis de sessão
session_destroy();

// Redirecione o usuário de volta para a página de login
header("Location: Login.php");
exit();
?>