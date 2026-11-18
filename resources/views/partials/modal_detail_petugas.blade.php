<!-- MODAL: Detail Petugas (lihat, edit, hapus) -->
<div
  class="modal-overlay"
  id="modalDetailPetugas"
  data-buka-edit="{{ $errors->updatePetugas->any() ? old('_petugas_id') : '' }}"
  data-old="{{ json_encode(old()) }}"
>
  <div class="modal-box">
    <div class="modal-header">
      <h2 id="judulModalDetail">Detail Petugas</h2>
      <button type="button" class="modal-close" onclick="tutupDetailPetugas()">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg>
      </button>
    </div>

    <!-- Panel 1: lihat data -->
    <div id="panelLihatPetugas">
      <dl class="detail-list">
        <div><dt>Nama Lengkap</dt><dd id="dp_nama"></dd></div>
        <div><dt>NIP</dt><dd id="dp_nip"></dd></div>
        <div><dt>Wilayah Tugas</dt><dd id="dp_wilayah"></dd></div>
        <div><dt>Kontak</dt><dd id="dp_kontak"></dd></div>
      </dl>

      <div class="modal-actions">
        <button type="button" class="btn-danger" onclick="mulaiHapusPetugas()">Hapus</button>
        <button type="button" class="btn-submit" onclick="mulaiEditPetugas()">Edit</button>
      </div>
    </div>

    <!-- Panel 2: edit data -->
    <div id="panelEditPetugas" hidden>
      <form method="POST" id="formEditPetugas" action="">
        @csrf
        @method('PUT')
        <input type="hidden" name="_petugas_id" value="">

        <div class="modal-field">
          <label for="ep_nama_lengkap">Nama Lengkap</label>
          <input type="text" id="ep_nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap">
        @if ($errors->updatePetugas->has('nama_lengkap'))
          <div class="error-text">{{ $errors->updatePetugas->first('nama_lengkap') }}</div>
        @endif
        </div>

        <div class="modal-field">
          <label for="ep_nip">NIP</label>
          <input type="text" id="ep_nip" name="nip" placeholder="Masukkan NIP" inputmode="numeric">
        @if ($errors->updatePetugas->has('nip'))
          <div class="error-text">{{ $errors->updatePetugas->first('nip') }}</div>
        @endif
        </div>

        <div class="modal-field">
          <label for="ep_wilayah_tugas">Wilayah Tugas</label>
          <select id="ep_wilayah_tugas" name="wilayah_tugas">
            <option value="" disabled>Pilih wilayah tugas</option>
            @foreach ($daftarWilayah as $wilayah)
              <option value="{{ $wilayah }}">{{ $wilayah }}</option>
            @endforeach
          </select>
        @if ($errors->updatePetugas->has('wilayah_tugas'))
          <div class="error-text">{{ $errors->updatePetugas->first('wilayah_tugas') }}</div>
        @endif
        </div>

        <div class="modal-field">
          <label for="ep_kontak">Kontak</label>
          <input type="text" id="ep_kontak" name="kontak" placeholder="0812-3456-7890">
        @if ($errors->updatePetugas->has('kontak'))
          <div class="error-text">{{ $errors->updatePetugas->first('kontak') }}</div>
        @endif
        </div>

        <div class="modal-field">
          <label for="ep_password">Password Baru <span class="label-hint">(kosongkan jika tidak diganti)</span></label>
          <input type="password" id="ep_password" name="password" placeholder="Minimal 8 karakter, ada huruf & angka" autocomplete="new-password">
        @if ($errors->updatePetugas->has('password'))
          <div class="error-text">{{ $errors->updatePetugas->first('password') }}</div>
        @endif
        </div>

        <div class="modal-field">
          <label for="ep_password_confirmation">Konfirmasi Password Baru</label>
          <input type="password" id="ep_password_confirmation" name="password_confirmation" placeholder="Ulangi password baru" autocomplete="new-password">
        </div>

        <div class="modal-actions">
          <button type="button" class="btn-cancel" onclick="kembaliLihatPetugas()">Batal</button>
          <button type="submit" class="btn-submit">Simpan Perubahan</button>
        </div>
      </form>
    </div>

    <!-- Panel 3: konfirmasi hapus -->
    <div id="panelHapusPetugas" hidden>
      <p class="hapus-teks">
        Hapus petugas <strong id="dp_hapus_nama"></strong>? Akunnya tidak bisa dipakai login lagi dan tindakan ini tidak dapat dibatalkan.
      </p>

      <form method="POST" id="formHapusPetugas" action="">
        @csrf
        @method('DELETE')
        <div class="modal-actions">
          <button type="button" class="btn-cancel" onclick="kembaliLihatPetugas()">Batal</button>
          <button type="submit" class="btn-danger">Ya, Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>