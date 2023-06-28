
// criem um javascript que execute as tabelas abaixo ()

<?php

$host = 'localhost';
$dbname = 'biblioteca';
$username = 'root';
$password = '';

try {
// Criando a conexão com o banco de dados usando PDO
$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

// Habilitando o modo de erro do PDO para exceções
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Definindo as atribuições das tabelas
    $tableStatements = [

        "CREATE TABLE IF NOT EXISTS cadastro (
        id INT(20) NOT NULL AUTO_INCREMENT,
        nome VARCHAR(255) NOT NULL,
        codigo VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        senha VARCHAR(255) NOT NULL,
        checksenha VARCHAR(255) NOT NULL,
        PRIMARY KEY (id),
        UNIQUE KEY (senha)
        )",

// Definindo as instruções das tabelas
$tableStatements = [


"CREATE TABLE IF NOT EXISTS cadastro (
id INT(20) NOT NULL AUTO_INCREMENT,
nome VARCHAR(255) NOT NULL,
codigo VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
senha VARCHAR(255) NOT NULL,
checksenha VARCHAR(255) NOT NULL,
PRIMARY KEY (id),
UNIQUE KEY (senha)
)",

"CREATE TABLE IF NOT EXISTS superusuario (
id INT(11) NOT NULL AUTO_INCREMENT,
login VARCHAR(255) NOT NULL,
codigo VARCHAR(255) NOT NULL,
email varchar(255) NOT NULL,
senha VARCHAR(255) NOT NULL,
PRIMARY KEY (id)
)",

"CREATE TABLE IF NOT EXISTS users (
id INT(11) NOT NULL AUTO_INCREMENT,
login VARCHAR(255) NOT NULL,
codigo VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
senha VARCHAR(255) NOT NULL,
PRIMARY KEY (id),
foreign key (senha) REFERENCES cadastro(senha)
)",


"CREATE TABLE IF NOT EXISTS cancelametos(
id INT(50) PRIMARY KEY, 
nome VARCHAR(50) NOT NULL,
motivo VARCHAR(100) NOT NULL,  
)",
        

    // Executando as instruções das taelas
    foreach ($tableStatements as $tableStatement) {
        $pdo->exec($tableStatement);
    }

    echo "Instruções das tabelas exeutadas com sucesso.";
} catch (PDOException $e) {
    echo "Erro na execução das instruções das tabelas: " . $e->getMessage();
}

//Fechando a conexão com o banco de dados

"CREATE TABLE IF NOT EXISTS agendamentos (
id INT(11) NOT NULL AUTO_INCREMENT,
nome VARCHAR(50) NOT NULL,
data DATE NOT NULL,
hora_inicio TIME NOT NULL,
hora_termino TIME NOT NULL,
quantidade_alunos INT(11) NOT NULL,
curso VARCHAR(50) NOT NULL,
PRIMARY KEY (id)
)",

"CREATE TABLE IF NOT EXISTS cancelamentos (
id INT (50) PRIMARY KEY,
nome VARCHAR(50) NOT NULL,
motivo VARCHAR(100) NOT NULL
)",

"CREATE TRIGGER delete_agendamento
AFTER INSERT ON cancelamentos
FOR EACH ROW
BEGIN
  DELETE FROM agendamentos
  WHERE id = NEW.id AND nome = NEW.nome;
END"
];

// Executando as instruções das tabelas
foreach ($tableStatements as $tableStatement) {
$pdo->exec($tableStatement);
}

echo "Instruções das tabelas executadas com sucesso.";
} catch(PDOException $e) {
echo "Erro na execução das instruções das tabelas: " . $e->getMessage();
}

// Fechando a conexão com o banco de dados

$pdo = null;

?>