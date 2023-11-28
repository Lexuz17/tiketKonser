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
        Schema::create('concerts', function (Blueprint $table) {
            $table->id();
            // Foreign key companys id
            $table->foreignId('company_id')->constrained('companys')->onDelete('restrict');
            $table->string('nama_konser', 255);
            $table->date('tanggal');
            $table->time('waktu', $precision = 0);
            $table->string('tempat', 100);
            $table->string('gambar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concerts');
    }
};
