<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengembalian extends Model
{
    use HasFactory;

    protected $table="pengembalian";
    protected $primary_key = "id";
    protected $fillable = ['peminjaman_id','user_id','kendaraan_id','tgl_pengembalian','waktu_pengembalian','status_pengembalian','ontime','keterangan'];


    public function peminjaman():BelongsTo{
        return $this->belongsTo(Peminjaman::class);
    }

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function kendaraan():BelongsTo{
        return $this->belongsTo(Kendaraan::class);
    }
    

}
