if (performance.navigation.type == 1) {
  const urlLogin = new URLSearchParams(window.location.search);
  const erroParam = urlLogin.get('error');

  if (erroParam === '1001') {
    window.location.href = 'Login.php';
  }
}
