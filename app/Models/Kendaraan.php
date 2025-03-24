<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kendaraan extends Model
{
    use HasFactory;

    protected  $table ='kendaraan';
    protected $primary_key = 'id';
    protected $fillable = ['jenis_kendaraan_id','merk','nopol','warna','status_kendaraan','img_kendaraan'];

    public function jenisKendaraan():BelongsTo{
        return $this->belongsTo(JenisKendaraan::class, 'jenis_kendaraan_id','id');
    }
}
