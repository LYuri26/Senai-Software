<?php

    $host = '127.0.0.1';
    $dbname = 'u683147803_senaisoftwarev';
    $username = 'u683147803_senaisoftwarev';
    $password = 'Senaimg123';
// Conectar ao banco de dados usando mysqli

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    // Habilitando o modo de erro do PDO para EXCEÇÕES no BD que caso tenha erro mostrará msg
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Definindo as atribuições das tabelas
    $tableStatements = [

        "CREATE TABLE IF NOT EXISTS cadastro (
        id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        codigo VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        senha VARCHAR(255) NOT NULL,
        checksenha VARCHAR(255) NOT NULL,
        UNIQUE KEY (senha)
        )",

        "CREATE TABLE IF NOT EXISTS superusuario (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        login VARCHAR(255) NOT NULL, 
        email VARCHAR(255) NOT NULL,
        senha VARCHAR(255) NOT NULL
        )",

        "CREATE TABLE IF NOT EXISTS users (
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        login VARCHAR(255) NOT NULL, 
        email VARCHAR(255) NOT NULL,
        senha VARCHAR(255) NOT NULL,
        FOREIGN KEY (senha) REFERENCES cadastro(senha)
        )",

        "CREATE TABLE IF NOT EXISTS agendamentos(
            id INT(50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(50) NOT NULL,
            data DATE NOT NULL,
            hora_inicio TIME NOT NULL,
            hora_termino TIME NOT NULL,
            quantidade_alunos INT(11) NOT NULL,
            curso VARCHAR(50) NOT NULL
        )",

        "CREATE TABLE IF NOT EXISTS cancelamentos(
  id INT(50) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(50) NOT NULL,
  motivo VARCHAR(100) NOT NULL
);
        "

    ];

    // Executando as instruções das taelas
    foreach ($tableStatements as $tableStatement) {
        $pdo->exec($tableStatement);
    }

    echo "Instruções das tabelas executadas com sucesso.";
} catch (PDOException $e) {
    echo "Erro na execução das instruções das tabelas: " . $e->getMessage();
}

//Fechando a conexão com o banco de dados
$pdo = null;

?>
