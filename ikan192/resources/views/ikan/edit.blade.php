<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Ikan</title>
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
        .form-title {
            font-size: 1.8rem;
            color: #003366;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 2rem auto;
        }
        .btn-back {
            background-color: #fbc02d;
            color: white;
            font-size: 14px;
            border: none;
            margin-bottom: 1rem;
        }
        .btn-back:hover {
            background-color: #f9a825;
            color: white;
        }
        .btn-submit {
            background-color: #003366;
            color: white;
            font-size: 14px;
            border: none;
        }
        .btn-submit:hover {
            background-color: #002244;
            color: white;
        }
        label {
            font-weight: bold;
            color: #003366;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="form-title">Edit Data Ikan</h2>
            <form action="{{ route('ikan.update', $ikan->kode_ikan) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_ikan" class="form-label">Nama Ikan</label>
                    <input type="text" id="nama_ikan" name="nama_ikan" class="form-control" value="{{ $ikan->nama_ikan }}" required>
                </div>
                <div class="mb-3">
                    <label for="jumlah_ikan" class="form-label">Jumlah Ikan</label>
                    <input type="number" id="jumlah_ikan" name="jumlah_ikan" class="form-control" value="{{ $ikan->jumlah_ikan }}" required>
                </div>
                <div class="mb-3">
                    <label for="tersedia" class="form-label">Tersedia</label>
                    <select id="tersedia" name="tersedia" class="form-select" required>
                        <option value="Y" {{ $ikan->tersedia === 'Y' ? 'selected' : '' }}>Ya</option>
                        <option value="N" {{ $ikan->tersedia === 'N' ? 'selected' : '' }}>Tidak</option>
                    </select>
                </div>
                <a href="{{ route('ikan.index') }}" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-submit float-end">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</body>
</html>
