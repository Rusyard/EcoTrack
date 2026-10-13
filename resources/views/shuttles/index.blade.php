<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Armada Shuttle</title>
</head>
<body>
    <h1>Daftar Armada Shuttle</h1>

    <!-- Tombol Tambah Data -->
    <a href="{{ route('shuttles.create') }}">+ Tambah Shuttle Baru</a>
    <br><br>

    <!-- Form Pencarian dengan Method GET -->
    <form action="{{ route('shuttles.index') }}" method="GET">
        <input type="text" name="search" placeholder="Cari nama armada..." value="{{ request('search') }}">
        <button type="submit">Cari</button>
    </form>
    <br>

    <!-- Tabel Menampilkan Data -->
    <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 15px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Armada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Melakukan iterasi data dari database -->
            @forelse($shuttles as $index => $shuttle)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $shuttle->nama_armada }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="{{ route('shuttles.edit', $shuttle->id) }}">Edit</a>

                    <!-- Form Tombol Hapus dengan Method Spoofing -->
                    <form action="{{ route('shuttles.destroy', $shuttle->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            <!-- Jika data kosong, tampilkan pesan ini -->
            @empty
            <tr>
                <td colspan="3" style="text-align: center;">Tidak ada data armada ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>