<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Shuttle</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Laporan Data Shuttle</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama Armada</th>
                <th>Kapasitas</th>
                <th>Rute Operasional</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_armada }}</td>
                    <td>{{ $item->kapasitas }}</td>
                    <td>{{ $item->rute_operasional }}</td>
                    <td>{{ $item->status_aktif ? 'Aktif' : 'Nonaktif' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>