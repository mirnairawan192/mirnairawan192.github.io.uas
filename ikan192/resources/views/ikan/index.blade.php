<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ikan</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }
        .table-header {
            background-color: #003366; /* Biru tua */
            color: white;
            font-size: 14px;
            text-align: center;
            font-weight: bold;
        }
        .btn-edit {
            background-color: #fbc02d;
            color: white;
            font-size: 12px;
        }
        .btn-edit:hover {
            background-color: #f9a825;
            color: white;
        }
        .btn-delete {
            background-color: #d32f2f;
            color: white;
            font-size: 12px;
        }
        .btn-delete:hover {
            background-color: #c62828;
            color: white;
        }
        .status-tersedia {
            color: white;
            background-color: #388e3c;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
        }
        .status-kosong {
            color: white;
            background-color: #d32f2f;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
        }
        .page-title {
            font-size: 1.5rem;
            color: #003366;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f0f0f0; /* Abu-abu kalem */
        }
        .table tbody tr:nth-child(even) {
            background-color: #e8e8e8; /* Abu-abu lebih terang */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="page-title">Data Ikan</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-header">
                <tr>
                    <th>Kode Ikan</th>
                    <th>Nama Ikan</th>
                    <th>Jumlah Ikan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataIkan as $index => $ikan)
                <tr>
                    <td>{{ 19201 + $index }}</td>
                    <td>{{ $ikan->nama_ikan }}</td>
                    <td>{{ $ikan->jumlah_ikan }}</td>
                    <td>
                        @if($ikan->tersedia === 'Y')
                            <span class="status-tersedia">✔ Tersedia (Y)</span>
                        @else
                            <span class="status-kosong">✘ Kosong (N)</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('ikan.edit', $ikan->kode_ikan) }}" class="btn btn-edit btn-sm">
                            ✏ Edit
                        </a>
                        <form action="{{ route('ikan.destroy', $ikan->kode_ikan) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                🗑 Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p class="text-center mt-4 text-secondary">Data terakhir diperbarui: {{ now()->format('d-m-Y H:i') }}</p>
    </div>
</body>
</html>
