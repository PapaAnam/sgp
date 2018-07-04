<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDendaDanTotalPelunanasanDanStatusToTabelOrderFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_final', function (Blueprint $table) {
            $table->double('denda')->nullable();
            $table->double('bunga')->nullable();
            $table->string('status')->nullable();
            $table->double('total_pelunasan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_final', function (Blueprint $table) {
            $table->dropColumn('denda');
            $table->dropColumn('bunga');
            $table->dropColumn('status');
            $table->dropColumn('total_pelunasan');
        });
    }
}
