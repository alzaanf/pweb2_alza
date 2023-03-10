<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers;

class pemasukkan extends Model
{
    use HasFactory;

    protected $table='data_pemasukan';
    protected $guardate = [];
    // protected $fillable = ['id_pemasukan', 'jenis', 'nama', 'banyak', 'harga_satuan', ''];
}
