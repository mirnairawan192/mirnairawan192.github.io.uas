<?php

namespace App\Http\Controllers;

use App\Models\KeranjangBelanja;
use Illuminate\Http\Request;

class KeranjangBelanjaController extends Controller
{
    // Method untuk menampilkan halaman index dengan data keranjang belanja
    public function index(Request $request)
    {
        // Query untuk mengambil data keranjang belanja
        $query = KeranjangBelanja::query();

        // Jika ada pencarian berdasarkan kode barang
        if ($request->has('search') && $request->search !== null) {
            $query->where('KodeBarang', 'like', '%' . $request->search . '%');
        }

        // Ambil hasil query dengan pagination
        $dataKeranjang = $query->paginate(10);

        // Kirim data dan kata kunci pencarian ke view
        $search = $request->input('search');
        return view('keranjangbelanja.index', compact('dataKeranjang', 'search'));
    }

    // Method untuk menampilkan form tambah data keranjang belanja
    public function create()
    {
        return view('keranjangbelanja.create');
    }

    // Method untuk menyimpan data keranjang belanja baru ke database
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'KodeBarang' => 'required|string|max:255',
            'Jumlah' => 'required|integer|min:1',
            'Harga' => 'required|integer|min:1',
        ]);

        // Simpan data ke database
        KeranjangBelanja::create($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('keranjangbelanja.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Method untuk menampilkan form edit data keranjang belanja
    public function edit($id)
    {
        // Cari data berdasarkan ID
        $keranjang = KeranjangBelanja::findOrFail($id);

        // Kirim data ke view
        return view('keranjangbelanja.edit', compact('keranjang'));
    }

    // Method untuk memperbarui data keranjang belanja di database
    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'KodeBarang' => 'required|string|max:255',
            'Jumlah' => 'required|integer|min:1',
            'Harga' => 'required|integer|min:1',
        ]);

        // Cari data berdasarkan ID dan update
        $keranjang = KeranjangBelanja::findOrFail($id);
        $keranjang->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('keranjangbelanja.index')->with('success', 'Data berhasil diperbarui!');
    }

    // Method untuk menghapus data keranjang belanja
    public function destroy($id)
    {
        // Cari data berdasarkan ID
        $keranjang = KeranjangBelanja::findOrFail($id);

        // Hapus data
        $keranjang->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('keranjangbelanja.index')->with('success', 'Data berhasil dihapus!');
    }

    // Method untuk menangani tombol beli
    public function beli($id)
    {
        // Cari data berdasarkan ID
        $keranjang = KeranjangBelanja::findOrFail($id);

        // Update status menjadi "dibeli"
        $keranjang->status = 'dibeli'; // Pastikan ada kolom 'status' di database
        $keranjang->save();

        // Redirect dengan pesan sukses
        return redirect()->route('keranjangbelanja.index')->with('success', 'Barang berhasil dibeli!');
    }

    // Method untuk menangani tombol batal
    public function batal($id)
    {
        // Cari data berdasarkan ID
        $keranjang = KeranjangBelanja::findOrFail($id);

        // Update status menjadi "batal"
        $keranjang->status = 'batal'; // Pastikan ada kolom 'status' di database
        $keranjang->save();

        // Redirect dengan pesan sukses
        return redirect()->route('keranjangbelanja.index')->with('success', 'Transaksi berhasil dibatalkan!');
    }
}
