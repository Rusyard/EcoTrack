document.getElementById('registerForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const pass = document.getElementById('password').value;
  const confirm = document.getElementById('confirmPassword').value;
  if (pass !== confirm) {
    alert('Password dan konfirmasi password tidak cocok.');
    return;
  }
  alert('Form pendaftaran siap dihubungkan ke backend.');
});
