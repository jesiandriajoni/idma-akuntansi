<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoriakun extends Model
{
    use HasFactory;
    protected $fillable=[
        "nama"
    ];
    public function akun(){
        return $this->hasMany(Akun::class,'kategori_id','id');
    }
}
