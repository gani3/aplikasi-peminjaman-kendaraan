<?php

use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Kendaraan::class);
            $table->date('tgl_keberangkatan');
            $table->time('waktu_peminjaman');
            $table->date('tgl_pengembalian');
            $table->string('tujuan');
            $table->enum('status_peminjaman',['0','1','2','3'])->comment('0 = menunggu, 1 = di setujui, 2 = ditolak, 3 = selesai');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
