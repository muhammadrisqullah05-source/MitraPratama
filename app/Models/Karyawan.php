<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $fillable = ['nama','alamat','tanggal_lahir','tempat_lahir','jumlah_keluarga','no_hp','posisi','gaji'];
}
