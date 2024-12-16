<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangBelanja extends Model
{
    use HasFactory;

    protected $table = 'keranjangbelanja'; // Nama tabel di database

    // Kolom yang bisa diisi secara mass assignment
    protected $fillable = ['KodeBarang', 'Jumlah', 'Harga'];

    // Tambahan, jika kamu menggunakan timestamps dan kolomnya berbeda
    public $timestamps = false; // Nonaktifkan timestamps jika tabel tidak memiliki kolom created_at dan updated_at
}
