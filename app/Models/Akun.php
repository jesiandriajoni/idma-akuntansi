<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    use HasFactory;
    protected $fillable=[
        "kategori_id","nama_kategori","no_akun","akun","deskripsi"
        ];
        public function kategoriakun(){
            return $this->belongsTo(Kategoriakun::class,'kategori_id','id');
        }
}
