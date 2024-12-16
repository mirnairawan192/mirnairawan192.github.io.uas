<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data pegawai dari database
        $query = Pegawai::query();

        // Jika ada pencarian berdasarkan nama pegawai
        if ($request->has('search') && $request->search !== null) {
            $query->where('nama_pegawai', 'like', '%' . $request->search . '%');
        }

        // Ambil data hasil query
        $dataPegawai = $query->get();

        // Kirim data ke view
        return view('pegawai.index', compact('dataPegawai'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama_pegawai' => 'required|string|max:50',
            'jabatan' => 'required|string|max:50',
            'gaji' => 'required|integer|min:0',
        ]);

        // Simpan data pegawai ke database
        Pegawai::create($request->all());

        // Redirect ke halaman pegawai dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan!');
    }

    public function edit($kode_pegawai)
    {
        // Cari data pegawai berdasarkan kode_pegawai
        $pegawai = Pegawai::findOrFail($kode_pegawai);

        // Kirim data ke view
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $kode_pegawai)
    {
        // Validasi data input
        $request->validate([
            'nama_pegawai' => 'required|string|max:50',
            'jabatan' => 'required|string|max:50',
            'gaji' => 'required|integer|min:0',
        ]);

        // Update data pegawai
        $pegawai = Pegawai::findOrFail($kode_pegawai);
        $pegawai->update($request->all());

        // Redirect ke halaman pegawai dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil diperbarui!');
    }

    public function destroy($kode_pegawai)
    {
        // Hapus data pegawai berdasarkan kode_pegawai
        $pegawai = Pegawai::findOrFail($kode_pegawai);
        $pegawai->delete();

        // Redirect ke halaman pegawai dengan pesan sukses
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus!');
    }
}
