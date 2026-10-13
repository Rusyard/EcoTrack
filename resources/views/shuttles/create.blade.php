<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Shuttle</title>
</head>
<body>
    <h1>Tambah Armada Shuttle</h1>

    <form action="{{ route('shuttles.store') }}" method="POST">
        <!-- WAJIB: Directive Security CSRF -->
        @csrf

        <div>
            <label for="nama_armada">Nama Armada:</label><br>
            <input type="text" id="nama_armada" name="nama_armada" required>
        </div>
        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('shuttles.index') }}">Batal</a>
    </form>
</body>
</html>