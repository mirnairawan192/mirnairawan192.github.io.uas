<?php

namespace App\Http\Controllers;

use App\Models\Ikan;
use Illuminate\Http\Request;

class IkanController extends Controller
{
    public function index(Request $request)
    {
        // Query untuk mengambil data ikan
        $query = Ikan::query();

        // Jika ada pencarian berdasarkan nama ikan
        if ($request->has('search') && $request->search !== null) {
            $query->where('nama_ikan', 'like', '%' . $request->search . '%');
        }

        // Ambil hasil query
        $dataIkan = $query->get();

        // Kirim data ke view
        return view('ikan.index', compact('dataIkan'));
    }

    // Method untuk menampilkan form tambah data ikan
    public function create()
    {
        return view('ikan.tambah');
    }

    // Method untuk menyimpan data ikan baru ke database
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama_ikan' => 'required|string|max:30',
            'jumlah_ikan' => 'required|integer|min:0',
            'tersedia' => 'required|in:Y,N',
        ]);

        // Simpan data ke database
        Ikan::create([
            'nama_ikan' => $request->nama_ikan,
            'jumlah_ikan' => $request->jumlah_ikan,
            'tersedia' => $request->tersedia,
        ]);

        // Redirect ke halaman data ikan dengan pesan sukses
        return redirect()->route('ikan.index')->with('success', 'Data ikan berhasil ditambahkan!');
    }

    // Method untuk menampilkan form edit data ikan
    public function edit($kode_ikan)
    {
        // Cari data ikan berdasarkan kode_ikan
        $ikan = Ikan::findOrFail($kode_ikan);

        // Kirim data ke view
        return view('ikan.edit', compact('ikan'));
    }

    // Method untuk memperbarui data ikan di database
    public function update(Request $request, $kode_ikan)
    {
        // Validasi data
        $request->validate([
            'nama_ikan' => 'required|string|max:30',
            'jumlah_ikan' => 'required|integer|min:0',
            'tersedia' => 'required|in:Y,N',
        ]);

        // Cari data ikan dan update
        $ikan = Ikan::findOrFail($kode_ikan);
        $ikan->update([
            'nama_ikan' => $request->nama_ikan,
            'jumlah_ikan' => $request->jumlah_ikan,
            'tersedia' => $request->tersedia,
        ]);

        // Redirect ke halaman data ikan dengan pesan sukses
        return redirect()->route('ikan.index')->with('success', 'Data ikan berhasil diperbarui!');
    }

    // Method untuk menghapus data ikan
    public function destroy($kode_ikan)
    {
        // Cari data ikan berdasarkan kode_ikan
        $ikan = Ikan::findOrFail($kode_ikan);

        // Hapus data ikan
        $ikan->delete();

        // Redirect kembali ke halaman data ikan dengan pesan sukses
        return redirect()->route('ikan.index')->with('success', 'Data ikan berhasil dihapus!');
    }
}
