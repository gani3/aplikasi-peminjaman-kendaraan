<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table="peminjaman";
    protected $primary_key = "id";
    protected $fillable = ['user_id','kendaraan_id','tgl_keberangkatan','waktu_peminjaman','tgl_pengembalian','tujuan','status_peminjaman','keterangan'];


    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function kendaraan():BelongsTo{
        return $this->belongsTo(Kendaraan::class);
    }
    
}
