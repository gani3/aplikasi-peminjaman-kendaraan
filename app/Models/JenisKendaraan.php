<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisKendaraan extends Model
{
    use HasFactory;

    protected  $table ='jenis_kendaraan';
    protected $primary_key = 'id';
    protected $fillable = ['id_jenis_kendaraan','jenis_kendaraan'];

}
