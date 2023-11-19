<?php

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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('titik_ambil');
            $table->string('tujuan');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_pengambilan');
            $table->double('ongkos_kirim')->nullable();
            $table->double('biaya_tambahan')->nullable();
            $table->double('total')->nullable();
            $table->integer('status')->default(1);
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
