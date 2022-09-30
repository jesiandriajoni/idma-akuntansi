<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Butranskeluar extends Model
{
    use HasFactory;
    protected $fillable=[
        "tanggal","notr","dibayar","nominal","terbilang","ket","nama_direktur","nama_karyawan"
    ];

}
