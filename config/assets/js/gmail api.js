function iniciarAPI() {
    // Chama a função para inicializar a API do Gmail
    initGmailAPI();
}
function checkAuth() {
    gapi.auth.authorize({
        client_id: '258998056882-iqgnnsd2j54b6oc07dk2k8t6tfsrbris.apps.googleusercontent.com',
        scope: 'https://www.googleapis.com/auth/gmail.readonly https://www.googleapis.com/auth/gmail.send',
        immediate: true
    }, handleAuthResult);
}

gapi.load('client:auth2', function () {
    gapi.client.init({
        'apiKey': '',
        'clientId': '258998056882-iqgnnsd2j54b6oc07dk2k8t6tfsrbris.apps.googleusercontent.com',
        'scope': 'https://www.googleapis.com/auth/gmail.readonly https://www.googleapis.com/auth/gmail.send',
        'discoveryDocs': ['https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest']
    }).then(function () {
        // Agora é seguro chamar a gapi.auth.authorize e outras chamadas relacionadas ao Gmail API
        // ...
        // Autenticação do Gmail 
        gapi.auth.authorize({
            'client_id': '258998056882-iqgnnsd2j54b6oc07dk2k8t6tfsrbris.apps.googleusercontent.com',
            'scope': 'https://www.googleapis.com/auth/gmail.readonly https://www.googleapis.com/auth/gmail.send',
            'immediate': false
        }, enviarEmail);

        // Define a função que será chamada após a autenticação do usuário 
        function enviarEmail(authResult) {
            console.log('Auth result:', authResult);
            if (authResult && !authResult.error) {
                // Instancia o objeto gapi.client.gmail 
                gapi.client.load('gmail', 'v1', function () {
                    // Configura a mensagem de e-mail 
                    const mensagem = ` 
        <h1>Cadastro realizado com sucesso</h1> 
        <p>Olá, seu cadastro foi realizado com sucesso!</p> 
      `;
                    const assunto = 'Cadastro realizado com sucesso';
                    console.log('Destinatario:', assunto);

                    const destinatario = document.querySelector('#email').value;
                    console.log('Destinatario:', destinatario);

                    // Inclui o email do destinatário na definição da string corpoMensagem
                    const corpoMensagem = 'To: ' + destinatario + '\r\n Subject: ' + assunto + '\r\n\r\n' + mensagem;
                    console.log('Destinatario:', corpoMensagem);

                    // Envia a mensagem utilizando a API do Gmail 
                    const request = gapi.client.gmail.users.messages.send({
                        'userId': 'me',
                        'resource': {
                            'raw': btoa(corpoMensagem).replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/, '')
                        }
                    }
                    )
                    console.log('Destinatario:', request);
                    ;
                    request.execute(function (response) {
                        console.log(response);
                    });
                });
            }
            console.log('Auth result:', authResult);
        }
    });
});
function initGmailAPI() {
    // Carrega a biblioteca da API do Gmail
    gapi.load('client', function () {
        // Configura as informações do cliente 
        gapi.client.init({
            'apiKey': '',
            'clientId': '258998056882-iqgnnsd2j54b6oc07dk2k8t6tfsrbris.apps.googleusercontent.com',
            'scope': 'https://www.googleapis.com/auth/gmail.readonly https://www.googleapis.com/auth/gmail.send',
            'discoveryDocs': ['https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest']
        }).then(function () {
            // Chama a função para enviar o e-mail
            enviarEmail();
        });
    });
}