document.addEventListener("DOMContentLoaded", function () {
    const tabelasBD = document.getElementById("teste")

    const menuPhpPath = "../config/assets/bd/tabelas.php";
    fetch(menuPhpPath)
        .then((response) => response.text())
        .then((data) => {
            // Inserir o conteúdo do menu.php na div .atividades
            tabelasBD.innerHTML = data;
        })
        .catch((error) => {
            console.error("Erro ao carregar o menu:", error);
        });
});
