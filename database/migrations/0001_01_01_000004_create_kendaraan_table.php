<?php

use App\Models\JenisKendaraan;
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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(JenisKendaraan::class);
            $table->string('merk');
            $table->string('nopol');
            $table->string('warna');
            $table->string('img_kendaraan')->nullable();
            $table->enum('status_kendaraan',['0','1'])->comment('0 = dipinjam, 1 = standby');
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
