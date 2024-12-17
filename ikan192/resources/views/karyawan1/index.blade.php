<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
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
            background-color: #003366;
            color: white;
            text-align: center;
            font-weight: bold;
        }
        .btn-add { background-color: #fbc02d; color: white; }
        .btn-add:hover { background-color: #f9a825; color: white; }
        .btn-edit { background-color: #4caf50; color: white; }
        .btn-delete { background-color: #d32f2f; color: white; }
        .page-title {
            font-size: 1.5rem;
            color: #003366;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
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
                        <a class="nav-link" href="{{ route('ikan.index') }}">Data Ikan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pegawai.index') }}">Data Pegawai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('karyawan1.index') }}">Data Karyawan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Header -->
        <h2 class="page-title">Mirna Irawan - 5026221192</h2>
        <h3 class="page-title">Data Karyawan</h3>

        <!-- Tombol Tambah Karyawan Baru -->
        <div class="mb-3">
            <a href="{{ route('karyawan1.create') }}" class="btn btn-add btn-sm">+ Tambah Karyawan Baru</a>
        </div>

        <!-- Form Pencarian -->
        <form action="{{ route('karyawan1.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nama karyawan..." value="{{ request('search') }}">
                <button class="btn btn-success" type="submit">CARI</button>
            </div>
        </form>

        <!-- Tabel Data Karyawan -->
        @if($dataKaryawan->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada data karyawan.
            </div>
        @else
            <table class="table table-bordered table-hover">
                <thead class="table-header">
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Pangkat</th>
                        <th>Gaji</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataKaryawan as $karyawan)
                    <tr>
                        <td>{{ $karyawan->NIP }}</td>
                        <td>{{ $karyawan->Nama }}</td>
                        <td>{{ $karyawan->Pangkat }}</td>
                        <td>Rp {{ number_format($karyawan->Gaji, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('karyawan1.show', $karyawan->NIP) }}" class="btn btn-info btn-sm">👁 View</a>
                            <a href="{{ route('karyawan1.edit', $karyawan->NIP) }}" class="btn btn-edit btn-sm">✏ Edit</a>
                            <form action="{{ route('karyawan1.destroy', $karyawan->NIP) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑 Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
