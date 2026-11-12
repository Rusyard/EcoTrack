const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('statusFilter');
const rows = document.querySelectorAll('#petugasTableBody tr');

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

// ===== Modal Tambah Petugas =====
const modalTambahPetugas = document.getElementById('modalTambahPetugas');

function bukaModalTambahPetugas() {
  modalTambahPetugas.classList.add('is-open');
}

function tutupModalTambahPetugas() {
  modalTambahPetugas.classList.remove('is-open');
}

// Klik di luar kotak modal (di area overlay gelap) ikut menutup modal.
modalTambahPetugas.addEventListener('click', (e) => {
  if (e.target === modalTambahPetugas) {
    tutupModalTambahPetugas();
  }
});

// Fungsi-fungsi ini dipanggil dari atribut onclick di HTML. Script yang dimuat
// Vite berupa module (tidak otomatis global), jadi dipasang ke window.
Object.assign(window, { bukaModalTambahPetugas, tutupModalTambahPetugas });
