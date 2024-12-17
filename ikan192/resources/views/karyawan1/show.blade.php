<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f7f9fc; font-family: 'Poppins', sans-serif; }
        .container { margin-top: 50px; background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .data-label { font-weight: bold; color: #003366; }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Detail Data Karyawan</h2>
        <div class="mb-3"><span class="data-label">NIP:</span> {{ $karyawan->NIP }}</div>
        <div class="mb-3"><span class="data-label">Nama:</span> {{ $karyawan->Nama }}</div>
        <div class="mb-3"><span class="data-label">Pangkat:</span> {{ $karyawan->Pangkat }}</div>
        <div class="mb-3"><span class="data-label">Gaji:</span> Rp {{ number_format($karyawan->Gaji, 0, ',', '.') }}</div>
        <a href="{{ route('karyawan1.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>
</html>
