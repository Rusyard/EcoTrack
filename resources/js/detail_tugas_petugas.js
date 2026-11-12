function gantiTabDetail(tab) {
  const panelDetail = document.getElementById('panel-detail-tugas');
  const panelUpdate = document.getElementById('panel-update-status');
  const tabDetail = document.getElementById('tab-detail');
  const tabUpdate = document.getElementById('tab-update');

  if (tab === 'detail') {
    panelDetail.style.display = 'block';
    panelUpdate.style.display = 'none';
    tabDetail.classList.add('active');
    tabUpdate.classList.remove('active');
  } else {
    panelDetail.style.display = 'none';
    panelUpdate.style.display = 'block';
    tabUpdate.classList.add('active');
    tabDetail.classList.remove('active');
  }
}

function fotoBuktiDipilih(input) {
  const sub = document.getElementById('foto-bukti-sub');
  if (input.files && input.files.length > 0) {
    sub.textContent = input.files[0].name;
  }
}

// Vite memuat JS sebagai module, jadi fungsi yang dipanggil dari atribut
// onclick/onchange di HTML harus didaftarkan ke window.
Object.assign(window, { gantiTabDetail, fotoBuktiDipilih });
