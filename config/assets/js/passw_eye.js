function limparFormulario() {
  document.getElementById("forms").reset();

  // Limpar manualmente os campos de texto
  var dados = document.querySelectorAll('#forms input[type="text"]');
  for (var i = 0; i < dados.length; i++) {
    dados[i].value = "";
  }
}
function togglePasswordVisibility() {
  var senhaInput = document.getElementById("senha");
  var toggleIcon = document.getElementById("password-toggle-icon");
  if (senhaInput.type === "password") {
    senhaInput.type = "text";
    toggleIcon.classList.remove("fa-eye");
    toggleIcon.classList.add("fa-eye-slash");
  } else {
    senhaInput.type = "password";
    toggleIcon.classList.remove("fa-eye-slash");
    toggleIcon.classList.add("fa-eye");
  }
}
