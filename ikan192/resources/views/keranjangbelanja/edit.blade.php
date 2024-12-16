@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Keranjang Belanja</h1>
    <form action="{{ route('keranjangbelanja.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="KodeBarang" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="KodeBarang" name="KodeBarang" value="{{ $data->KodeBarang }}" required>
        </div>
        <div class="mb-3">
            <label for="Jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="Jumlah" name="Jumlah" value="{{ $data->Jumlah }}" required>
        </div>
        <div class="mb-3">
            <label for="Harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="Harga" name="Harga" value="{{ $data->Harga }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
