const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('statusFilter');
const rows = document.querySelectorAll('#scheduleTableBody tr');

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
