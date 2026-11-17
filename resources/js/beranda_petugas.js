function gantiTab(tab) {
  const hariIni = document.getElementById('konten-hari-ini');
  const besok = document.getElementById('konten-besok');
  const tabHariIni = document.getElementById('tab-hari-ini');
  const tabBesok = document.getElementById('tab-besok');

  if (tab === 'hari-ini') {
    hariIni.style.display = 'block';
    besok.style.display = 'none';
    tabHariIni.classList.add('active');
    tabHariIni.classList.remove('inactive');
    tabBesok.classList.add('inactive');
    tabBesok.classList.remove('active');
  } else {
    hariIni.style.display = 'none';
    besok.style.display = 'block';
    tabBesok.classList.add('active');
    tabBesok.classList.remove('inactive');
    tabHariIni.classList.add('inactive');
    tabHariIni.classList.remove('active');
  }
}

// Dipanggil dari atribut onclick di HTML, jadi didaftarkan ke window
// (Vite memuat JS sebagai module).
window.gantiTab = gantiTab;
