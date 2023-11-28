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
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->foreignId('transaction_id')->constrained('transactions');
            $table->foreignId('ticket_id')->constrained('tickets');
            $table->primary(['transaction_id', 'ticket_id']);
            // foreign key transid dan ticket id
            $table->integer('jumlah_ticket');
            $table->integer('total_harga_detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_transactions');
    }
};
