<?php

use App\Models\Kendaraan;
use App\Models\Peminjaman;
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
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Peminjaman::class);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Kendaraan::class);
            $table->date('tgl_pengembalian');
            $table->time('waktu_pengembalian');
            $table->enum('status_pengembalian',['0','1'])->comment('0 = belum dikembalikan, 1 = dikembalikan');
            $table->enum('ontime',['0','1'])->comment('0 = tepat waktu, 1 = terlambat');
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
