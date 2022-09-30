<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable=[
        "no_transaksi","tanggal","keterangan"
        ];
        public function jurnalumum(){
            return $this->hasMany(Jurnalumum::class);
        }
}
