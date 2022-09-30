<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{

    protected $fillable =[
        'nama_cus','nama_perusahan','alamat_cus','email_cus','telp_cus','harga'
    ];
}
