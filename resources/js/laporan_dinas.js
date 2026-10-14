// ===== Halaman Laporan Masuk (dinas): filter tabel + lightbox foto =====

const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('statusFilter');
const rows = document.querySelectorAll('#reportTableBody tr[data-search]');

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

// ----- Lightbox foto laporan -----
const lightboxOverlay = document.getElementById('lightboxOverlay');
const lightboxImage = document.getElementById('lightboxImage');

if (lightboxOverlay && lightboxImage) {
    const buka = (urlFoto) => {
        lightboxImage.src = urlFoto;
        lightboxOverlay.classList.add('is-open');
    };

    const tutup = () => {
        lightboxOverlay.classList.remove('is-open');
        lightboxImage.src = '';
    };

    document.querySelectorAll('[data-foto]').forEach((el) => {
        el.addEventListener('click', () => buka(el.dataset.foto));
    });

    document.querySelectorAll('[data-tutup-lightbox]').forEach((el) => {
        el.addEventListener('click', tutup);
    });

    // Klik di area gelap (di luar foto) ikut menutup.
    lightboxOverlay.addEventListener('click', (e) => {
        if (e.target === lightboxOverlay) {
            tutup();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            tutup();
        }
    });
}
