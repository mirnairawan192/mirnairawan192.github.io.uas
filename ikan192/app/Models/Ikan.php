<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ikan extends Model
{
    use HasFactory;

    protected $table = 'ikan'; // Nama tabel di database
    protected $primaryKey = 'kode_ikan'; // Primary key tabel
    public $timestamps = false; // Jika tidak ada kolom created_at dan updated_at

    protected $fillable = [
        'nama_ikan',
        'jumlah_ikan',
        'tersedia',
    ];
}
