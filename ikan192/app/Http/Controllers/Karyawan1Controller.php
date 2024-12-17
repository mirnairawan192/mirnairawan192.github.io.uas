<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan1;

class Karyawan1Controller extends Controller
{
    // Menampilkan semua data karyawan
    public function index(Request $request)
    {
        $query = Karyawan1::query();

        // Jika ada pencarian berdasarkan nama
        if ($request->has('search') && $request->search !== null) {
            $query->where('Nama', 'like', '%' . $request->search . '%');
        }

        $dataKaryawan = $query->get();
        return view('karyawan1.index', compact('dataKaryawan'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('karyawan1.create');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'NIP' => 'required|size:9|unique:karyawan1,NIP',
            'Nama' => 'required|max:50',
            'Pangkat' => 'required|size:5',
            'Gaji' => 'required|integer',
        ]);

        // Simpan data
        Karyawan1::create([
            'NIP' => $request->NIP,
            'Nama' => $request->Nama,
            'Pangkat' => $request->Pangkat,
            'Gaji' => $request->Gaji,
        ]);

        return redirect()->route('karyawan1.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    // Menampilkan detail data karyawan (read-only)
    public function show($NIP)
    {
        $karyawan = Karyawan1::findOrFail($NIP);
        return view('karyawan1.show', compact('karyawan'));
    }

    // Menampilkan form edit data karyawan
    public function edit($NIP)
    {
        $karyawan = Karyawan1::findOrFail($NIP);
        return view('karyawan1.edit', compact('karyawan'));
    }

    // Memperbarui data karyawan
    public function update(Request $request, $NIP)
    {
        // Validasi input
        $request->validate([
            'Nama' => 'required|max:50',
            'Pangkat' => 'required|size:5',
            'Gaji' => 'required|integer',
        ]);

        // Cari data karyawan berdasarkan NIP
        $karyawan = Karyawan1::findOrFail($NIP);

        // Update data
        $karyawan->update([
            'Nama' => $request->Nama,
            'Pangkat' => $request->Pangkat,
            'Gaji' => $request->Gaji,
        ]);

        return redirect()->route('karyawan1.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    // Menghapus data karyawan
    public function destroy($NIP)
    {
        $karyawan = Karyawan1::findOrFail($NIP);
        $karyawan->delete();

        return redirect()->route('karyawan1.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
