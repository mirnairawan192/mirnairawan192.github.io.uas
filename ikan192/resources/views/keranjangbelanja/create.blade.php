@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Data Keranjang Belanja</h1>
    <form action="{{ route('keranjangbelanja.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="KodeBarang" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="KodeBarang" name="KodeBarang" required>
        </div>
        <div class="mb-3">
            <label for="Jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="Jumlah" name="Jumlah" required>
        </div>
        <div class="mb-3">
            <label for="Harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="Harga" name="Harga" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
