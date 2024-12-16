<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
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
            font-size: 14px;
            text-align: center;
            font-weight: bold;
        }
        .btn-add {
            background-color: #fbc02d;
            color: white;
        }
        .btn-add:hover {
            background-color: #f9a825;
            color: white;
        }
        .btn-edit {
            background-color: #4caf50;
            color: white;
        }
        .btn-cancel {
            background-color: #2196f3;
            color: white;
        }
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
                        <a class="nav-link active" href="{{ route('keranjangbelanja.index') }}">Keranjang Belanja</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="page-title">Mirna Irawan - 5026221192</h2>
        <h3 class="page-title">Data Keranjang Belanja</h3>

        <!-- Tombol Tambah Barang Baru -->
        <div class="mb-3">
            <button type="button" class="btn btn-add btn-sm" data-bs-toggle="modal" data-bs-target="#addItemModal">
                + Tambah Barang Baru
            </button>
        </div>

        <!-- Modal Tambah Barang -->
        <div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('keranjangbelanja.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addItemModalLabel">Tambah Barang Baru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="KodeBarang" class="form-label">Kode Barang</label>
                                <input type="text" class="form-control" id="KodeBarang" name="KodeBarang" required>
                            </div>
                            <div class="mb-3">
                                <label for="Jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="Jumlah" name="Jumlah" min="1" required>
                            </div>
                            <div class="mb-3">
                                <label for="Harga" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="Harga" name="Harga" min="1" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Form Pencarian -->
        <form action="{{ route('keranjangbelanja.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari Barang .." value="{{ request('search') }}">
                <button class="btn btn-success" type="submit">CARI</button>
            </div>
        </form>

        <!-- Tabel Keranjang Belanja -->
        @if($dataKeranjang->isEmpty())
            <div class="alert alert-info text-center">
                Belum ada data keranjang belanja.
            </div>
        @else
            <table class="table table-bordered table-hover">
                <thead class="table-header">
                    <tr>
                        <th>ID</th>
                        <th>Kode Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataKeranjang as $keranjang)
                    <tr>
                        <td>{{ $keranjang->id }}</td>
                        <td>{{ $keranjang->KodeBarang }}</td>
                        <td>{{ $keranjang->Jumlah }}</td>
                        <td>Rp {{ number_format($keranjang->Harga, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($keranjang->Jumlah * $keranjang->Harga, 0, ',', '.') }}</td>
                        <td>
                            <button class="btn btn-edit btn-sm">Beli</button>
                            <button class="btn btn-cancel btn-sm">Batal</button>
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
