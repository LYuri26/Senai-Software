    // Função para executar as tabelas ao carregar o menu.
    
    function executarTabelas() { // Função é definida para executar a requisição AJAX e carregar as tabelas.
        /* Essa é uma função do jQuery que permite fazer requisições assíncronas usando AJAX.
        É usado para fazer a chamada ao arquivo "tabelas.php" e obter o resultado. */
        $.ajax({
            url: 'config/assets/bd/tabelas.php', // Caminho completo para o arquivo tabelas.php
            method: 'GET', // Define o método HTTP usado na requisição, neste caso, é uma solicitação GET.
            /* Uma função de callback que será executada se a requisição for bem-sucedida.
            Recebe o parâmetro response, que contém a resposta da requisição.
            Neste caso, exibe a mensagem "Tabelas executadas com sucesso." no console.*/
            success: function(response) { 
                console.log('Tabelas executadas com sucesso.');
            },
            /* Uma função de callback que será executada se a requisição encontrar algum erro.
            Recebe os parâmetros xhr, status e error, que fornecem informações sobre o erro.
            Neste caso, exibe a mensagem de erro no console, incluindo o detalhamento do erro. */
            error: function(xhr, status, error) {
                console.error('Erro ao executar as tabelas:', error);   
            }
        });
    }

    /* Define um evento que será disparado quando a página for completamente carregada.
    Neste caso, a função anônima é executada quando o evento onload é acionado.
    A função executarTabelas() é chamada nesse momento para iniciar o carregamento das tabelas. */
    window.onload = function() {
        executarTabelas();
    }; 