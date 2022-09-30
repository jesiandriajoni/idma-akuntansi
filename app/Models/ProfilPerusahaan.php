<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPerusahaan extends Model
{
    protected $fillable =[
        'logo','nama_per','alamat','telp','fax','npwp','website','email'
    ];
}
