<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnalpenyesuaian extends Model
{
    use HasFactory;
    protected $fillable=[
        "transaksi_id","akun_id","tanggal","no_akun","akun","deskripsi","referensi","debit","kredit"
        ];
        public function Akun(){
            return $this->belongsTo(Akun::class);

        }
}
