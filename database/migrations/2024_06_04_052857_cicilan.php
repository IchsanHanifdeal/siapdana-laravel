<?php

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
        Schema::create('cicilan', function (Blueprint $table) { 
            $table->id('id_cicilan');
            $table->date('tanggal_jatuhtempo');
            $table->date('tanggal_pembayaran')->nullable();
            $table->unsignedBigInteger('id_peminjaman');
            $table->foreign('id_peminjaman')->references('id_peminjaman')->on('peminjaman')->onDelete('cascade');
            $table->integer('jumlah_angsuran')->nullable();
            $table->string('sisa_bulan');
            $table->enum('status', ['Belum Bayar', 'Sudah Bayar'])->default('Belum Bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cicilan');
    }
};
