<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable =[
        'kode_jasa','nama_jasa','harga','keterangan','gambar_jasa'
    ];

}
