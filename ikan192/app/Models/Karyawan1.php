<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan1 extends Model
{
    use HasFactory;

    protected $table = 'karyawan1'; // Nama tabel
    protected $primaryKey = 'NIP'; // Primary Key
    public $incrementing = false; // Non-incrementing primary key
    protected $keyType = 'string'; // Primary key berupa string
    public $timestamps = false; // Jika tabel tidak memiliki kolom timestamps

    protected $fillable = ['Nama', 'Pangkat', 'Gaji'];
}
