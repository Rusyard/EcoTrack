// "Database" contoh akun untuk simulasi deteksi peran otomatis.
// Di aplikasi nyata, pengecekan ini dilakukan oleh backend saat proses autentikasi.
const petugasNIP = ['19870512001', '19900823002', '19921107003', '19880314004', '19950602005', '19850119006'];
const dinasNIP = ['19700315001'];
const masyarakatAccounts = ['budisantoso', 'budi.santoso@gmail.com', 'sitirahayu'];

const usernameInput = document.getElementById('username');
const usernameGroup = document.getElementById('usernameGroup');
const errorText = document.getElementById('errorText');

function detectRole(idValue) {
  const value = idValue.trim().toLowerCase();
  if (petugasNIP.includes(value)) return 'petugas';
  if (dinasNIP.includes(value)) return 'dinas';
  if (masyarakatAccounts.includes(value)) return 'masyarakat';

  // Fallback: NIP biasanya berupa angka. Kalau belum terdaftar di daftar contoh
  // tapi formatnya angka panjang, anggap petugas. Selain itu anggap akun masyarakat
  // (username/email bebas), supaya masyarakat tetap bisa login tanpa akun contoh di atas.
  if (/^\d{8,}$/.test(value)) return 'petugas';
  if (value.length > 0) return 'masyarakat';
  return null;
}

const roleRedirect = {
  masyarakat: 'dashboard-ecotrack.html',
  petugas: 'portal-petugas-ecotrack.html',
  dinas: 'admin-dashboard-ecotrack.html'
};
