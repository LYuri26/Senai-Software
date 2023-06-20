/* codigo original errado

if (performance.navigation.type === 2) {
  session_start();
  session_destroy();
}

*/
window.addEventListener('beforeunload', function () {
  document.title = 'Login'; // Alterar o título da página
  // Limpar a sessão antes de recarregar a página
  // Pode ser usado duas funcoes: sessionStorage.clear() ou localStorage.clear()
  document.cookie = '';
  sessionStorage.clear(); // Limpar a sessão
  localStorage.clear() // Limpar o armazenamento local
});

window.addEventListener('pageshow', function (event) {
  var inputs = document.querySelectorAll('input, textarea');
  document.cookie = '';
  sessionStorage.clear(); // Limpar a sessão
  localStorage.clear() // Limpar o armazenamento local
  inputs.forEach(function (input) {
    input.defaultValue = '';
  });
});

/*
function limparSessao() {
  // Envia uma requisição AJAX para o arquivo PHP que destruirá a sessão
  var requisicao = new XMLHttpRequest();
  var url = 'logout.php';
  var dados = 'error=1001'; // Dados adicionais no formato de string
  requisicao.open('POST', url, true);
  requisicao.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Define o cabeçalho
  requisicao.onreadystatechange = function () {
    if (requisicao.readyState === XMLHttpRequest.DONE && requisicao.status === 200) {
      document.title = 'Login'; // Alterar o título da página
      window.location.href = 'login.html?' + dados; // Redireciona para login.html com os dados adicionais
    }
  };
  
  requisicao.send(dados);
  var msgErro = document.getElementById('erroMsg');
  msgErro.textContent = 'Login ou senha inválidos.';
  document.title = 'Login'; // Alterar o título da página
}



/* nao funciona
tambem errado 
if (window.performance.persisted) {
  sessionStorage.clear(); // Limpa a sessão 
}

*/