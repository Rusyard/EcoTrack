// ===== Halaman Data Petugas (dinas): filter tabel + modal Tambah Petugas =====

const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('statusFilter');
const rows = document.querySelectorAll('#petugasTableBody tr[data-search]');

function applyFilters() {
    const query = searchInput.value.trim().toLowerCase();
    const status = statusFilter.value;

    rows.forEach((row) => {
        const cocokCari = row.dataset.search.includes(query);
        const cocokStatus = status === 'semua' || row.dataset.status === status;
        row.style.display = cocokCari && cocokStatus ? '' : 'none';
    });
}

if (searchInput && statusFilter) {
    searchInput.addEventListener('input', applyFilters);
    statusFilter.addEventListener('change', applyFilters);
}

// ----- Modal Tambah Petugas -----
const modal = document.getElementById('modalTambahPetugas');

if (modal) {
    const buka = () => modal.classList.add('is-open');
    const tutup = () => modal.classList.remove('is-open');

    document.querySelectorAll('[data-buka-modal]').forEach((el) => el.addEventListener('click', buka));
    document.querySelectorAll('[data-tutup-modal]').forEach((el) => el.addEventListener('click', tutup));

    // Klik di area gelap (di luar kotak modal) ikut menutup.
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            tutup();
        }
    });
}
