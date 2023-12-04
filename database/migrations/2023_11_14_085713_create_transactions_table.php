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
            // $table->timestamps();
            // Ambil user id foreign key
            $table->foreignId('user_id')->constrained('users');
            $table->date('tanggal');
            $table->time('waktu');
            $table->integer('total_ticket');
            $table->integer('total_harga_detail');
            $table->string('nama_lengkap');
            $table->string('no_telp', 20);
            $table->string('email');
            $table->string('nomor_ktp', 50);
            $table->string('metode_pembayaran', 50);
            $table->string('status_pembayaran', 50);
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
