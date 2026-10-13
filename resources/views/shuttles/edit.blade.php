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
            <label for="name">Nama Shuttle:</label><br>
            <!-- Isi atribut value dengan data lama -->
            <input type="text" id="name" name="name" value="{{ $shuttle->name }}" required>
        </div>
        <br>

        <div>
            <label for="license_plate">Plat Nomor:</label><br>
            <input type="text" id="license_plate" name="license_plate" value="{{ $shuttle->license_plate }}" required>
        </div>
        <br>

        <div>
            <label for="capacity">Kapasitas:</label><br>
            <input type="number" id="capacity" name="capacity" value="{{ $shuttle->capacity }}" required>
        </div>
        <br>

        <button type="submit">Update Data</button>
        <a href="{{ route('shuttles.index') }}">Batal</a>
    </form>
</body>
</html>