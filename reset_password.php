<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Recuperar senha</title>
    <!-- Importante deixarmos a codificação dos caracteres e o título no início de <head> para otimização e procura da página -->

    <!-- meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="robots" content="index, nofollow">
    <meta name="googlebot" content="index, nofollow">
    <meta name="googlebot" content="notranslate">
    <meta name="theme-color" content="#FFFFFF">
    <meta name="description" content="Cadastro biblioteca SENAI">
    <meta name="keywords" content="SENAI, Biblioteca, cadastro">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="author" content="SENAI">

    <!-- link tags -->
    <link rel="stylesheet" href="./config/assets/estilos/cadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="./config/assets/js/destruirSessao.js"></script>
    <!-- O ícone da página pode ser carregado no final, por questão de organização do código e porque é interessante processarmos as fontes e estilos primeiro do que o ícone -->
    <link rel="icon" href="./config/assets/img/senai.ico" type="image/x-icon">
</head>
<?php
// Conexão com o banco de dados MySQL usando PDO
$host = '127.0.0.1';
$dbname = 'biblioteca';
$username = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET FOREIGN_KEY_CHECKS=0");
} catch (PDOException $e) {
    // Caso contrário, exibe a mensagem de erro padrão
    echo "Erro: " . $e->getMessage();
    exit;
}

// Verifica se os campos foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados do formulário
    $usuario = $_POST["usuario"];
    $novaSenha = $_POST["novaSenha"];
    $Csenha = $_POST["Csenha"];

    // Verifica se as senhas coincidem
    if ($novaSenha !== $Csenha) {
        die("As senhas não coincidem.");
    }

    // Atualiza a senha no banco de dados
    $hashedPassword = password_hash($novaSenha, PASSWORD_DEFAULT);
    try {
        /* bloco 1 atualiza senha*/
        $sql1 = "UPDATE cadastro SET senha = :hashedPassword WHERE email = :usuario || nome = :usuario;";
        $stmt = $conn->prepare($sql1);
        $stmt->bindParam(':hashedPassword', $hashedPassword);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':Csenha', $Csenha);
        $stmt->execute();
    } catch (PDOException $e) {
        //  echo "Erro de entrada duplicada: " . $e->getMessage();
        if ($e->errorInfo[1] == 1062) {
            // Checa se o erro é código 1062 (Duplicate entry)
            echo "Erro: Por favor, utilize uma senha diferente da anterior. ";
            echo "<script>alert('Erro: Por favor, utilize uma senha diferente da anterior.');</script>";
        } else {
            // Caso contrário, exibe a mensagem de erro padrão
            echo "Erro: " . $e->getMessage();
        }
        exit;
    }
    try {
        /* bloco 2 atualiza checksenha*/
        $sql1 = "UPDATE cadastro SET checksenha = :hashedPassword WHERE email = :usuario || nome = :usuario;";
        $stmt = $conn->prepare($sql1);
        $stmt->bindParam(':hashedPassword', $hashedPassword);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':Csenha', $Csenha);
        $stmt->execute();
    } catch (PDOException $e) {
        //  echo "Erro de entrada duplicada: " . $e->getMessage();
        if ($e->errorInfo[1] == 1062) {
            // Checa se o erro é código 1062 (Duplicate entry)
            echo "Erro: Por favor, utilize uma senha diferente da anterior. ";
            echo "<script>alert('Erro: Por favor, utilize uma senha diferente da anterior.');</script>";
        } else {
            // Caso contrário, exibe a mensagem de erro padrão
            echo "Erro: " . $e->getMessage();
        }
        exit;
    }
    try {
        /* bloco 3 atualiza users */
        $sql = "UPDATE users SET senha = :hashedPassword WHERE email = :usuario || login = :usuario;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':hashedPassword', $hashedPassword);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':Csenha', $Csenha);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        exit;
    }
    /*
    $sql = "UPDATE users SET senha = :hashedPassword WHERE email = :usuario || login = :usuario;";
    $stmt = $conn->prepare($sql);
*/
    try {
        $stmt->execute();
        echo "Senha atualizada com sucesso!";
        echo "<script> setTimeout(function() { window.location.href = 'login.html'; }, 5000); </script>";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
        exit;
    }
}
// Fecha a conexão com o banco de dados
$conn = null;
