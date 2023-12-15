<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
            $table->integer('total_ticket')->nullable();
            $table->integer('total_harga_detail')->nullable();
            $table->string('nama_lengkap')->nullable();
            $table->string('no_telp', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('nomor_ktp', 50)->nullable();
            $table->string('metode_pembayaran', 50)->nullable();
            $table->string('status_pembayaran', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
