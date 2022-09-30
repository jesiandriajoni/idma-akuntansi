<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanPengguna extends Model
{
    protected $fillable =[
        'name','jabatan','jeniskelamin','telp','foto'
    ];
}
