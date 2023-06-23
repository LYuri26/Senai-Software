<?php
/*
usado para sempre verificar a sessão do usuário
require_once './session.php';

// Verificar se há uma sessão de usuário ou superusuário 
if (!(isset($_SESSION['usuario']) || isset($_SESSION['superusuario']))) { 
    // Redirecionar para a página de login 
    header("Location: login.html"); 
    exit;
}
*/
?>
<!DOCTYPE html>
<html>

<head>
    <title>Lista de agendamentos</title>
    <link rel="icon" href="./config/assets/img/linguicao.ico" type="image/x-icon">
    <link rel="stylesheet" href="./config/assets/estilos/consulta.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Fira+Sans:ital,wght@1,200&family=Montserrat:wght@200&family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-container">
                <a href="./menu.php">
                    <img src="./config/assets/img/senailogo1.png" class="logo">
                </a>
                <ul class="navbar-menu">
                    <li><a href="./agendar.php">Agendar</a></li>
                    <li><a href="./cancelar.php">Cancelar</a></li>
                    <li><a href="./cancelamentos.php">Cancelamentos</a></li>
                    <li><a href="./menu.php">Menu</a></li>
                    <li><a href="./logout.php">Sair</a></li>
                </ul>
            </div>
            <!-- <div class="navbar-toggle">
        <span class="navbar-toggle-icon"></span>
      </div>
      </div>-->
        </nav>
    </header>

    <a href="./logout.php" class="sair">Sair</a>

    <div id="app">

        <form method="post" onsubmit="exibirAlerta(event)">
            <label for="pesquisa">Pesquisar</label>
            <input type="text" id="pesquisa" name="pesquisa" required placeholder="Digite para pesquisar"><br><br>
            <label for="filtro">Filtrar</label>
                <select id="filtro" name="filtro" required>
                <option value="" disabled selected hidden>Escolha uma das opções abaixo</option> 
                <option value="Nome">Nome</option>
                <option value="Data">Data</option>
                <option value="Horario">Horário Inicial</option>
                <option value="Quantidade">Quantidade de Alunos</option>
                <option value="Curso">Curso</option>
            </select>
            <button type="submit" value="barra">Buscar</button>
            <!--
        <input type="radio" name="webmaster" value="sim"/> Nome<br />
<input type="radio" name="webmaster" value="nao"/> ID<br />
<input type="radio" name="webmaster" value="talvez"/> <br />
<input type="radio" name="webmaster" value="quem_sabe"/> Quem sabe
-->
            </select>

            <?php
            // Definir as informações de conexão
            $host = 'localhost';
            $banco = 'biblioteca';
            $usuario = 'root';
            $senha = '';

            // Conectar ao banco de dados usando mysqli

            try {
                $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4", $usuario, $senha);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Conexão falhou" . $e->getMessage();
            }
            // 2. Recuperar os valores do formulário
            $pesquisa = $_POST['pesquisa'];
            $filtro = $_POST['filtro'];

            // 3. Construir a consulta SQL
            $sql = "SELECT * FROM agendamentos WHERE ";

            // Adicionar o critério de pesquisa selecionado
            if ($filtro === "Nome") {
                $sql .= "Nome LIKE '%$pesquisa%'";
            } elseif ($filtro === "Data") {
                $sql .= "Data = '$pesquisa'";
            } elseif ($filtro === "Horario") {
                $sql .= "Horario = '$pesquisa'";
            } elseif ($filtro === "Quantidade") {
                $sql .= "Quantidade = '$pesquisa'";
            } elseif ($filtro === "Curso") {
                $sql .= "Curso LIKE '%$pesquisa%'";
            }


            // 4. Executar a consulta SQL e exibir os resultados
            $result = $pdo->query($sql);

            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    // Exibir os dados do agendamento encontrados
                    echo "Nome: " . $row["nome"] . "<br>";
                    echo "Data: " . $row["data"] . "<br>";
                    echo "Horário: " . $row["hora_inicio"] . "<br>";
                    echo "Quantidade de Alunos: " . $row["quantidade_alunos"] . "<br>";
                    echo "Curso: " . $row["curso"] . "<br><br>";
                }
            } else {
                echo "Nenhum resultado encontrado.";
            }
            // Fechar a conexão com o banco de dados
            ?>

            <!-- Seu formulário HTML -->
            <form method="post" onsubmit="exibirAlerta(event)">
                <label for="pesquisa">Pesquisar</label>
                <input type="text" id="pesquisa" name="pesquisa" required placeholder="Digite para pesquisar"><br><br>
                <button type="submit" value="barra">Buscar</button>
                <label for="filtro">Filtrar</label>
                <select id="filtro" name="filtro" required>
                    <option value="" disabled selected hidden>Escolha uma das opções abaixo</option>
                    <option value="Nome">Nome</option>
                    <option value="Data">Data</option>
                    <option value="Horario">Horário Inicial</option>
                    <option value="Quantidade">Quantidade de Alunos</option>
                    <option value="Curso">Curso</option>
                </select>
                <?php
                // Definir as informações de conexão
                $host = 'localhost';
                $dbname = 'biblioteca';
                $username = 'root';
                $password = '';

                // Conectar ao banco de dados usando mysqli

                try {
                    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo "Conexão falhou" . $e->getMessage();
                }

                // buscar agendamentos no banco de dados
                $query = "SELECT * FROM agendamentos";
                $busca = $pdo->query($query);
                $agendamentos = $busca->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <h1>Lista de Agendamentos</h1>
                <table>
                    <thead>
                        <tr>

                            <th>Nome</th>
                            <th>Data</th>
                            <th>Hora de Início</th>
                            <th>Hora de Término</th>
                            <th>Quantidade de Alunos</th>
                            <th>Curso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($agendamentos as $agendamento) : ?>
                            <tr>
                                <td><?php echo $agendamento['nome']; ?></td>
                                <td><?php echo $agendamento['data']; ?></td>
                                <td><?php echo $agendamento['hora_inicio']; ?></td>
                                <td><?php echo $agendamento['hora_termino']; ?></td>
                                <td><?php echo $agendamento['quantidade_alunos']; ?></td>
                                <td><?php echo $agendamento['curso']; ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
    </div>
    <script src="./config/assets/js/destruirSessao.js"></script>
    <footer>
        <div class="rodape">
            <p>&copy;2023 UAIBook. Todos os direitos reservados.</p>
            <p>Curso de Desenvolvimento em Sistemas.Trilhas do Futuro II. SENAI. Uberaba/MG.</p>
        </div>
    </footer>
</body>


</html>