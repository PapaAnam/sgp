<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_final', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik', 30);
            $table->integer('id_barang')->unsigned();
            $table->year('tahun')->nullable();
            $table->string('imei', 50)->nullable();
            $table->text('kelengkapan')->nullable();
            $table->double('pinjaman');
            $table->string('tenor',2)->nullable();
            $table->date('jatuh_tempo');
            $table->double('jumlah_tebus');
            $table->date('tanggal');
            $table->string('nota', 50);
            $table->double('denda')->nullable();
            $table->double('bunga')->nullable();
            $table->string('status')->nullable();
            $table->double('total_pelunasan')->nullable();
            $table->date('tanggal_tebus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_final');
    }
}
