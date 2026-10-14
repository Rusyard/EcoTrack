// ===== Halaman Jadwal Pengangkutan (dinas): filter tabel =====

const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('statusFilter');
const rows = document.querySelectorAll('#scheduleTableBody tr[data-search]');

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
