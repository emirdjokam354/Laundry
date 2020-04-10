<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTDetailTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaksi_id')->unsigned();
            $table->foreign('transaksi_id')->references('id')->on('t_transaksi')->onDelete('cascade');
            $table->bigInteger('paket_id')->unsigned();
            $table->foreign('paket_id')->references('id')->on('t_paket')->onDelete('cascade');
            $table->double('qty')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_detail_transaksi');
    }
}
