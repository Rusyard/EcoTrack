const searchInput = document.getElementById('searchInput');
const rows = document.querySelectorAll('#petugasTableBody tr[data-search]');

function applyFilters() {
  const query = searchInput.value.trim().toLowerCase();

  rows.forEach(row => {
    row.style.display = row.dataset.search.includes(query) ? '' : 'none';
  });
}

searchInput.addEventListener('input', applyFilters);

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

// ===== Modal Detail Petugas (lihat, edit, hapus) =====
const modalDetail = document.getElementById('modalDetailPetugas');
const formEdit = document.getElementById('formEditPetugas');
const formHapus = document.getElementById('formHapusPetugas');
const judulModalDetail = document.getElementById('judulModalDetail');

const panelDetail = {
  lihat: document.getElementById('panelLihatPetugas'),
  edit: document.getElementById('panelEditPetugas'),
  hapus: document.getElementById('panelHapusPetugas'),
};

const judulPanel = { lihat: 'Detail Petugas', edit: 'Edit Petugas', hapus: 'Hapus Petugas' };

function tampilkanPanel(nama) {
  Object.entries(panelDetail).forEach(([kunci, el]) => {
    el.hidden = kunci !== nama;
  });
  judulModalDetail.textContent = judulPanel[nama];
}

// Isi semua panel (data, form edit, form hapus) dari data satu petugas.
function isiPanelPetugas(p) {
  document.getElementById('dp_nama').textContent = p.nama;
  document.getElementById('dp_nip').textContent = p.nip;
  document.getElementById('dp_wilayah').textContent = p.wilayah || '-';
  document.getElementById('dp_kontak').textContent = p.kontak || '-';
  document.getElementById('dp_hapus_nama').textContent = p.nama;

  formEdit.action = p.urlUpdate;
  formEdit.elements['_petugas_id'].value = p.id;
  formEdit.elements['nama_lengkap'].value = p.nama;
  formEdit.elements['nip'].value = p.nip;
  formEdit.elements['kontak'].value = p.kontak || '';
  formEdit.elements['wilayah_tugas'].value = p.wilayah || '';
  formEdit.elements['password'].value = '';
  formEdit.elements['password_confirmation'].value = '';

  formHapus.action = p.urlHapus;
}

function bukaDetailPetugas(tombol) {
  isiPanelPetugas(JSON.parse(tombol.dataset.petugas));
  // Pesan error dari percobaan edit sebelumnya jangan ikut tampil di petugas lain.
  panelDetail.edit.querySelectorAll('.error-text').forEach(el => el.remove());
  tampilkanPanel('lihat');
  modalDetail.classList.add('is-open');
}

function tutupDetailPetugas() {
  modalDetail.classList.remove('is-open');
}

function mulaiEditPetugas() { tampilkanPanel('edit'); }
function mulaiHapusPetugas() { tampilkanPanel('hapus'); }
function kembaliLihatPetugas() { tampilkanPanel('lihat'); }

modalDetail.addEventListener('click', (e) => {
  if (e.target === modalDetail) {
    tutupDetailPetugas();
  }
});

// Kalau simpan perubahan ditolak validasi, halaman dimuat ulang: buka lagi
// modal di panel edit untuk petugas yang sama, isinya pakai input terakhir.
const idBukaEdit = modalDetail.dataset.bukaEdit;
if (idBukaEdit) {
  const tombol = document.querySelector('.detail-btn[data-petugas-id="' + idBukaEdit + '"]');
  if (tombol) {
    isiPanelPetugas(JSON.parse(tombol.dataset.petugas));
    const lama = JSON.parse(modalDetail.dataset.old || '{}');
    ['nama_lengkap', 'nip', 'kontak', 'wilayah_tugas'].forEach((nama) => {
      if (lama[nama] !== undefined && lama[nama] !== null) {
        formEdit.elements[nama].value = lama[nama];
      }
    });
    tampilkanPanel('edit');
    modalDetail.classList.add('is-open');
  }
}

// Fungsi-fungsi ini dipanggil dari atribut onclick di HTML. Script yang dimuat
// Vite berupa module (tidak otomatis global), jadi dipasang ke window.
Object.assign(window, {
  bukaModalTambahPetugas,
  tutupModalTambahPetugas,
  bukaDetailPetugas,
  tutupDetailPetugas,
  mulaiEditPetugas,
  mulaiHapusPetugas,
  kembaliLihatPetugas,
});