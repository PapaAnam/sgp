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
            $table->string('nik');
            $table->integer('id_barang')->unsigned();
            $table->year('tahun')->nullable();
            $table->string('imei')->nullable();
            $table->text('kelengkapan')->nullable();
            $table->string('pinjaman')->nullable();
            $table->string('tenor')->nullable();
            $table->date('jatuh_tempo');
            $table->double('jumlah_tebus');
            $table->date('tanggal');
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
