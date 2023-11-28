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
        Schema::create('concert_categories', function (Blueprint $table) {
            $table->foreignId('concert_id')->constrained('concerts');
            $table->foreignId('category_concert_id')->constrained('category_concerts');
            // $table->timestamps();
            // Ini buat table many to many nya concert dan category concerts
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concert_categories');
    }
};
