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
        Schema::create('detail_carts', function (Blueprint $table) {
            $table->id();
            // foreign key ke carts id
            // Foreign key ke tikcet id
            $table->foreignId('cart_id')->constrained('carts');
            $table->foreignId('ticket_id')->constrained('tickets');
            // $table->timestamps();
            // Jadi ini buat table many to manynya.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_carts');
    }
};
