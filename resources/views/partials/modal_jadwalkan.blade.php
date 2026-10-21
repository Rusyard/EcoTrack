<!-- MODAL: Buat Instruksi Jadwal Pengangkutan -->
<div class="modal-overlay" id="modalJadwalkanOverlay">
  <div class="modal-box">
    <div class="modal-header">
      <div class="modal-title">Buat Instruksi Jadwal Pengangkutan</div>
      <button type="button" class="modal-close" onclick="tutupModalJadwalkan()">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg>
      </button>
    </div>
    <div class="modal-subtitle">Kirimkan tugas kepada petugas lapangan</div>

    <div class="modal-target-box">
      <div class="modal-target-label">TARGET TPS</div>
      <div class="modal-target-nama" id="modalTargetNama"></div>
      <div class="modal-target-alamat" id="modalTargetAlamat"></div>
    </div>

    <form id="formJadwalkan" method="POST" action="" data-url-template="{{ route('laporan.jadwalkan', ['laporan' => 0]) }}">
      @csrf

      <div class="modal-field">
        <label for="modalPetugas">Petugas yang Ditugaskan</label>
        <select id="modalPetugas" name="petugas_id" required>
          <option value="" disabled selected>Pilih petugas...</option>
          @foreach ($daftarPetugas as $petugas)
            <option value="{{ $petugas->id }}">{{ $petugas->nama_lengkap }} — {{ $petugas->wilayah_tugas }}</option>
          @endforeach
        </select>
      </div>

      <div class="modal-row">
        <div class="modal-field">
          <label for="modalTanggal">Tanggal Pengangkutan</label>
          <input type="date" id="modalTanggal" name="tanggal" required>
        </div>
        <div class="modal-field">
          <label for="modalWaktu">Jam Pengangkutan</label>
          <input type="time" id="modalWaktu" name="waktu" required>
        </div>
      </div>

      <div class="modal-field">
        <label for="modalCatatan">Catatan / Instruksi</label>
        <textarea id="modalCatatan" name="catatan" placeholder="Instruksi khusus untuk petugas..."></textarea>
      </div>

      <div class="modal-actions">
        <button type="button" class="modal-btn-batal" onclick="tutupModalJadwalkan()">Batal</button>
        <button type="submit" class="modal-btn-kirim">Kirim Instruksi Ke Petugas</button>
      </div>
    </form>
  </div>
</div>
