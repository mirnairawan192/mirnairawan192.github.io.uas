<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Ikan</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            border-left: 8px solid #002855;
        }
        .header-title {
            font-size: 28px;
            font-weight: bold;
            color: #002855;
            text-align: center;
            margin-bottom: 0.5rem;
        }
        h3 {
            color: #002855;
            font-weight: 600;
            text-align: center;
            margin-bottom: 2rem;
        }
        .btn-primary {
            background-color: #002855;
            border-color: #002855;
            color: #ffffff;
        }
        .btn-primary:hover {
            background-color: #001d3d;
            border-color: #001d3d;
        }
        .btn-secondary {
            background-color: #f7c873;
            border-color: #f7c873;
            color: #002855;
        }
        .btn-secondary:hover {
            background-color: #e5b566;
            border-color: #e5b566;
        }
        .form-label {
            font-weight: bold;
            color: #34495e;
        }
        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }
        footer {
            text-align: center;
            margin-top: 2rem;
            font-size: 14px;
            color: #6c757d;
        }
        footer a {
            text-decoration: none;
            color: #002855;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container">
            <div class="mb-4 text-center">
                <p class="header-title">Mirna Irawan - 5026221192</p>
                <h3>Tambah Data Ikan</h3>
            </div>
            <a href="{{ route('ikan.index') }}" class="btn btn-secondary mb-3">Kembali</a>
            <form action="{{ route('ikan.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nama_ikan" class="form-label">Nama Ikan</label>
                    <input type="text" name="nama_ikan" id="nama_ikan" class="form-control" placeholder="Masukkan nama ikan" required>
                </div>
                <div class="mb-4">
                    <label for="jumlah_ikan" class="form-label">Jumlah Ikan</label>
                    <input type="number" name="jumlah_ikan" id="jumlah_ikan" class="form-control" placeholder="Masukkan jumlah ikan" required>
                </div>
                <div class="mb-4">
                    <label for="tersedia" class="form-label">Status Ketersediaan</label>
                    <select name="tersedia" id="tersedia" class="form-select">
                        <option value="Y">Tersedia</option>
                        <option value="N">Tidak Tersedia</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan Data</button>
            </form>
            <footer>
                <p>© <a href="#">Mirna's Fisheries</a> 2024</p>
            </footer>
        </div>
    </div>
</body>
</html>
