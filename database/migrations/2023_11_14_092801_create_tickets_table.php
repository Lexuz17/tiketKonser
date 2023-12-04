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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            // concert id foreign key
            $table->foreignId('concert_id')->constrained('concerts');
            $table->string('kategori', 50);
            $table->integer('harga');
            $table->integer('jumlah_tersedia');
            $table->date('tanggal_mulai_penjualan');
            $table->date('tanggal_selesai_penjualan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
