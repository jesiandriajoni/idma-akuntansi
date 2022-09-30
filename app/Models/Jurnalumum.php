<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnalumum extends Model
{
    use HasFactory;
    protected $fillable=[
        "transaksi_id","akun_id","tanggal","no_akun","akun","deskripsi","referensi","debit","kredit","status"
        ];
        public function Akun(){
            return $this->belongsTo(Akun::class);

        }
        public function Transaksi(){
            return $this->belongsTo(Transaksi::class);

        }
}
