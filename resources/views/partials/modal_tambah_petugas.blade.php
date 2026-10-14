{{-- Variabel: $daftarWilayah (array nama wilayah) --}}
<div
  class="modal-overlay @error('nip') is-open @enderror @error('nama_lengkap') is-open @enderror @error('kontak') is-open @enderror @error('wilayah_tugas') is-open @enderror @error('password') is-open @enderror"
  id="modalTambahPetugas"
>
  <div class="modal-box">
    <div class="modal-header">
      <h2>Tambah Petugas</h2>
      <button type="button" class="modal-close" data-tutup-modal>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg>
      </button>
    </div>

    <form method="POST" action="{{ route('keloladata.petugas.store') }}">
      @csrf

      <div class="modal-field">
        <label for="tp_nama_lengkap">Nama Lengkap</label>
        <input type="text" id="tp_nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap">
        @error('nama_lengkap')
          <div class="error-text">{{ $message }}</div>
        @enderror
      </div>

      <div class="modal-field">
        <label for="tp_nip">NIP</label>
        <input type="text" id="tp_nip" name="nip" value="{{ old('nip') }}" placeholder="Masukkan NIP" inputmode="numeric">
        @error('nip')
          <div class="error-text">{{ $message }}</div>
        @enderror
      </div>

      <div class="modal-field">
        <label for="tp_wilayah_tugas">Wilayah Tugas</label>
        <select id="tp_wilayah_tugas" name="wilayah_tugas">
          <option value="" disabled {{ old('wilayah_tugas') ? '' : 'selected' }}>Pilih wilayah tugas</option>
          @foreach ($daftarWilayah as $wilayah)
            <option value="{{ $wilayah }}" {{ old('wilayah_tugas') === $wilayah ? 'selected' : '' }}>{{ $wilayah }}</option>
          @endforeach
        </select>
        @error('wilayah_tugas')
          <div class="error-text">{{ $message }}</div>
        @enderror
      </div>

      <div class="modal-field">
        <label for="tp_kontak">Kontak</label>
        <input type="text" id="tp_kontak" name="kontak" value="{{ old('kontak') }}" placeholder="0812-3456-7890">
        @error('kontak')
          <div class="error-text">{{ $message }}</div>
        @enderror
      </div>

      <div class="modal-field">
        <label for="tp_password">Password Awal</label>
        <input type="password" id="tp_password" name="password" placeholder="Minimal 8 karakter, ada huruf & angka">
        @error('password')
          <div class="error-text">{{ $message }}</div>
        @enderror
      </div>

      <div class="modal-field">
        <label for="tp_password_confirmation">Konfirmasi Password</label>
        <input type="password" id="tp_password_confirmation" name="password_confirmation" placeholder="Ulangi password">
      </div>

      <div class="modal-actions">
        <button type="button" class="btn-cancel" data-tutup-modal>Batal</button>
        <button type="submit" class="btn-submit">Simpan Petugas</button>
      </div>
    </form>
  </div>
</div>
