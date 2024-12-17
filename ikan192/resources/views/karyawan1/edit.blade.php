<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Karyawan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            margin-top: 50px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #003366;
            border: none;
        }
        .btn-primary:hover {
            background-color: #002244;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Edit Data Karyawan</h2>
        <form action="{{ route('karyawan1.update', $karyawan->NIP) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- NIP -->
            <div class="mb-3">
                <label for="NIP" class="form-label">NIP</label>
                <input type="text" class="form-control" id="NIP" name="NIP" value="{{ $karyawan->NIP }}" readonly>
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label for="Nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="Nama" name="Nama" value="{{ $karyawan->Nama }}" required>
            </div>

            <!-- Pangkat -->
            <div class="mb-3">
                <label for="Pangkat" class="form-label">Pangkat</label>
                <input type="text" class="form-control" id="Pangkat" name="Pangkat" value="{{ $karyawan->Pangkat }}" required>
            </div>

            <!-- Gaji -->
            <div class="mb-3">
                <label for="Gaji" class="form-label">Gaji</label>
                <input type="number" class="form-control" id="Gaji" name="Gaji" value="{{ $karyawan->Gaji }}" required>
            </div>

            <!-- Tombol Simpan dan Batal -->
            <div class="d-flex justify-content-end">
                <a href="{{ route('karyawan1.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
