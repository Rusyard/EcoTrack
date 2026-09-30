// ===== Filter pencarian + status (halaman dinas bertabel) =====
const searchInput = document.getElementById('searchInput');
const statusFilter = document.getElementById('statusFilter');

if (searchInput && statusFilter) {
    const rows = document.querySelectorAll('.table-card tbody tr');

    const applyFilters = () => {
        const query = searchInput.value.trim().toLowerCase();
        const status = statusFilter.value;

        rows.forEach((row) => {
            const matchesSearch = row.dataset.search.includes(query);
            const matchesStatus = status === 'semua' || row.dataset.status === status;
            row.style.display = matchesSearch && matchesStatus ? '' : 'none';
        });
    };

    searchInput.addEventListener('input', applyFilters);
    statusFilter.addEventListener('change', applyFilters);
}

// ===== Tab sederhana =====
// Tombol/judul tab: data-tab="nama"  -> menampilkan panel data-panel="nama"
// Tombol pintasan : data-goto-tab="nama" (hanya pindah tab, tidak ikut diberi warna aktif)
const tabButtons = document.querySelectorAll('[data-tab]');
const tabPanels = document.querySelectorAll('[data-panel]');

if (tabButtons.length > 0) {
    const showTab = (name) => {
        tabPanels.forEach((panel) => {
            panel.style.display = panel.dataset.panel === name ? 'block' : 'none';
        });

        tabButtons.forEach((button) => {
            const aktif = button.dataset.tab === name;
            button.classList.toggle('active', aktif);
            button.classList.toggle('inactive', !aktif);
        });
    };

    tabButtons.forEach((button) => {
        button.addEventListener('click', () => showTab(button.dataset.tab));
    });

    document.querySelectorAll('[data-goto-tab]').forEach((button) => {
        button.addEventListener('click', () => showTab(button.dataset.gotoTab));
    });
}

// ===== Pilihan status pengangkutan (Mulai / Selesai) =====
const statusToggles = document.querySelectorAll('.status-toggle');

statusToggles.forEach((toggle) => {
    toggle.addEventListener('click', () => {
        statusToggles.forEach((item) => item.classList.remove('active'));
        toggle.classList.add('active');
    });
});

// ===== Tampilkan nama file foto bukti =====
const fotoInput = document.getElementById('foto-bukti-input');
const fotoSub = document.getElementById('foto-bukti-sub');

if (fotoInput && fotoSub) {
    fotoInput.addEventListener('change', () => {
        if (fotoInput.files.length > 0) {
            fotoSub.textContent = fotoInput.files[0].name;
        }
    });
}

// ===== Form laporan TPS (masyarakat) =====
const reportForm = document.getElementById('reportForm');

if (reportForm) {
    const textarea = document.getElementById('deskripsi');
    const charCount = document.getElementById('charCount');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    const uploadZone = document.getElementById('uploadZone');

    const tampilkanNamaFile = (nama) => {
        filePreview.textContent = 'Terpilih: ' + nama;
        filePreview.style.display = 'block';
    };

    textarea.addEventListener('input', () => {
        charCount.textContent = textarea.value.length;
    });

    fileInput.addEventListener('change', () => {
        if (fileInput.files.length > 0) {
            tampilkanNamaFile(fileInput.files[0].name);
        }
    });

    ['dragover', 'dragenter'].forEach((evt) => {
        uploadZone.addEventListener(evt, (e) => {
            e.preventDefault();
            uploadZone.classList.add('dragover');
        });
    });

    ['dragleave', 'drop'].forEach((evt) => {
        uploadZone.addEventListener(evt, (e) => {
            e.preventDefault();
            uploadZone.classList.remove('dragover');
        });
    });

    uploadZone.addEventListener('drop', (e) => {
        if (e.dataTransfer.files.length > 0) {
            fileInput.files = e.dataTransfer.files;
            tampilkanNamaFile(e.dataTransfer.files[0].name);
        }
    });

    reportForm.addEventListener('submit', (e) => {
        e.preventDefault();

        if (!document.querySelector('input[name="lokasi"]:checked')) {
            alert('Silakan pilih lokasi TPS.');
            return;
        }

        if (textarea.value.length < 20) {
            alert('Deskripsi minimal 20 karakter.');
            return;
        }

        // Nanti: kirim ke LaporanController@store
        alert('Laporan siap dikirim ke server.');
    });
}