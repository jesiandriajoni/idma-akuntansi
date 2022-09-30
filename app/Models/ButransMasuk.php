<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButransMasuk extends Model
{
    use HasFactory;
    protected $table="butransmasuks";
    protected $fillable=[
        "tanggal","notr","diterima","nominal","terbilang","ket","nama_direktur","nama_karyawan"
    ];


}

