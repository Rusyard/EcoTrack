const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('statusFilter');
const rows = document.querySelectorAll('#reportTableBody tr');

function applyFilters() {
  const query = searchInput.value.trim().toLowerCase();
  const status = statusFilter.value;

  rows.forEach(row => {
    const matchesSearch = row.dataset.search.includes(query);
    const matchesStatus = status === 'semua' || row.dataset.status === status;
    row.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
  });
}

searchInput.addEventListener('input', applyFilters);
statusFilter.addEventListener('change', applyFilters);

// ===== Lightbox foto laporan =====
const lightboxOverlay = document.getElementById('lightboxOverlay');
const lightboxImage = document.getElementById('lightboxImage');

function bukaLightbox(urlFoto) {
  lightboxImage.src = urlFoto;
  lightboxOverlay.classList.add('is-open');
}

function tutupLightbox() {
  lightboxOverlay.classList.remove('is-open');
  lightboxImage.src = '';
}

lightboxOverlay.addEventListener('click', (e) => {
  if (e.target === lightboxOverlay) {
    tutupLightbox();
  }
});

document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    tutupLightbox();
    tutupModalJadwalkan();
  }
});

// ===== Modal: Jadwalkan =====
const modalJadwalkanOverlay = document.getElementById('modalJadwalkanOverlay');
const formJadwalkan = document.getElementById('formJadwalkan');
const modalTargetNama = document.getElementById('modalTargetNama');
const modalTargetAlamat = document.getElementById('modalTargetAlamat');

// Dibuat dengan placeholder "0" lalu diganti JS, karena route()
// butuh model Laporan beneran padahal id-nya baru diketahui saat
// tombol "Jadwalkan" di-klik (satu modal dipakai bareng buat semua baris).
// Placeholder "0" ini ada di TENGAH url (".../0/jadwalkan"), bukan di
// ujung, jadi di-ganti pakai regex /\/0\// (bukan /\/0$/ yang gak akan
// pernah cocok karena url-nya tidak berakhiran "/0").
// (URL template-nya dibuat Blade dan dibaca dari atribut data-url-template
// pada <form id="formJadwalkan">, karena file JS ini tidak diproses Blade.)
const urlJadwalkanTemplate = formJadwalkan.dataset.urlTemplate;

function bukaModalJadwalkan(laporanId, kodeLaporan, namaTps, alamatTps) {
  modalTargetNama.textContent = namaTps;
  modalTargetAlamat.textContent = alamatTps;
  formJadwalkan.action = urlJadwalkanTemplate.replace('/0/', '/' + laporanId + '/');
  formJadwalkan.reset();
  modalJadwalkanOverlay.classList.add('is-open');
}

function tutupModalJadwalkan() {
  modalJadwalkanOverlay.classList.remove('is-open');
}

modalJadwalkanOverlay.addEventListener('click', (e) => {
  if (e.target === modalJadwalkanOverlay) {
    tutupModalJadwalkan();
  }
});

// Fungsi-fungsi ini dipanggil dari atribut onclick di HTML. Script yang dimuat
// Vite berupa module (tidak otomatis global), jadi dipasang ke window.
Object.assign(window, { bukaLightbox, tutupLightbox, bukaModalJadwalkan, tutupModalJadwalkan });
