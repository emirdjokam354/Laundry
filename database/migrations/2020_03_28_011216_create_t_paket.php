<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPaket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_paket', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_outlet');
            $table->enum('jenis',['kiloan','selimut','bed_cover','kaos','lain']);
            $table->string('nm_paket');
            $table->integer('harga');
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
        Schema::dropIfExists('t_paket');
    }
}
