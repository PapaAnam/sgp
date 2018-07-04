<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerpanjanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpanjangan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_order_final');
            $table->string('tenor')->nullable();
            $table->date('jatuh_tempo');
            $table->double('jumlah_tebus');
            $table->date('tanggal');
            $table->double('bunga');
            $table->double('denda');
            $table->double('admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perpanjangan');
    }
}
