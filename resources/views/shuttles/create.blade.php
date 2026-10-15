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
            <input type="text" id="nama_armada" name="nama_armada" required, value="{{ old('nama_armada') }}">
            @error('nama_armada')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <label for="kapasitas">Kapasitas:</label><br>
            <input type="number" id="kapasitas" name="kapasitas" required, value="{{ old('kapasitas') }}">
            @error('kapasitas')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <br>
        <div>
            <label for="rute_operasional">Rute Operasional:</label><br>
            <input type="text" id="rute_operasional" name="rute_operasional" required, value="{{ old('rute_operasional') }}">
            @error('rute_operasional')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('shuttles.index') }}">Batal</a>
    </form>
</body>
</html>