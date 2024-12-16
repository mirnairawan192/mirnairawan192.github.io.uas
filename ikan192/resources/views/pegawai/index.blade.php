<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Poppins', sans-serif;
        }
        .table-header {
            background-color: #003366; /* Biru tua */
            color: white;
            font-size: 14px;
            text-align: center;
            font-weight: bold;
        }
        .btn-warning {
            background-color: #fbc02d;
            border: none;
            color: white;
        }
        .btn-warning:hover {
            background-color: #f9a825;
        }
        .btn-danger {
            background-color: #d32f2f;
            border: none;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c62828;
        }
        .btn-success {
            background-color: #388e3c;
            border: none;
            color: white;
        }
        .btn-success:hover {
            background-color: #2e7d32;
        }
        .page-title {
            font-size: 1.8rem;
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
        .navbar {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Data Management</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('ikan') ? 'active' : '' }}" href="{{ route('ikan.index') }}">Data Ikan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('pegawai') ? 'active' : '' }}" href="{{ route('pegawai.index') }}">Data Pegawai</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="page-title">Data Pegawai</h2>

        <!-- Form Pencarian -->
        <form action="{{ route('pegawai.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nama pegawai..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <!-- Tabel Data Pegawai -->
        <table class="table table-bordered table-hover">
            <thead class="table-header">
                <tr>
                    <th>Kode Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataPegawai as $pegawai)
                <tr>
                    <td>{{ $pegawai->kode_pegawai }}</td>
                    <td>{{ $pegawai->nama_pegawai }}</td>
                    <td>{{ $pegawai->jabatan }}</td>
                    <td>{{ number_format($pegawai->gaji, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('pegawai.edit', $pegawai->kode_pegawai) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pegawai.destroy', $pegawai->kode_pegawai) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('pegawai.create') }}" class="btn btn-success mt-3">Tambah Pegawai</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
