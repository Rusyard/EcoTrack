const textarea = document.getElementById('deskripsi');
const charCount = document.getElementById('charCount');
textarea.addEventListener('input', () => {
  charCount.textContent = textarea.value.length;
});

const fileInput = document.getElementById('fileInput');
const filePreview = document.getElementById('filePreview');
const uploadZone = document.getElementById('uploadZone');

fileInput.addEventListener('change', () => {
  if (fileInput.files.length > 0) {
    filePreview.textContent = 'Terpilih: ' + fileInput.files[0].name;
    filePreview.style.display = 'block';
  }
});

['dragover', 'dragenter'].forEach(evt => {
  uploadZone.addEventListener(evt, (e) => {
    e.preventDefault();
    uploadZone.classList.add('dragover');
  });
});

['dragleave', 'drop'].forEach(evt => {
  uploadZone.addEventListener(evt, (e) => {
    e.preventDefault();
    uploadZone.classList.remove('dragover');
  });
});

uploadZone.addEventListener('drop', (e) => {
  if (e.dataTransfer.files.length > 0) {
    fileInput.files = e.dataTransfer.files;
    filePreview.textContent = 'Terpilih: ' + e.dataTransfer.files[0].name;
    filePreview.style.display = 'block';
  }
});

document.getElementById('reportForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const lokasi = document.querySelector('input[name="lokasi"]:checked');
  if (!lokasi) {
    alert('Silakan pilih lokasi TPS.');
    return;
  }
  if (textarea.value.length < 20) {
    alert('Deskripsi minimal 20 karakter.');
    return;
  }
  alert('Laporan siap dikirim ke server.');
});
