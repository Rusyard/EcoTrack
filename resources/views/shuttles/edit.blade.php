<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Shuttle</title>
</head>
<body>
    <h1>Edit Data Shuttle</h1>

    <form action="{{ route('shuttles.update', $shuttle->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Method Spoofing untuk HTTP PUT -->

        <div>
            <label for="nama_armada">Nama Armada:</label><br>
            <!-- Atribut name dan value disesuaikan dengan nama_armada -->
            <input type="text" id="nama_armada" name="nama_armada" value="{{ $shuttle->nama_armada }}" required, value="{{ old('nama_armada') }}">
            @error('nama_armada')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>
        <br>

        <button type="submit">Update Data</button>
        <a href="{{ route('shuttles.index') }}">Batal</a>
    </form>
</body>
</html>