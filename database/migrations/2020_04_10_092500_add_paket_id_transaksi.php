<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaketIdTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_transaksi', function($table){
            $table->bigInteger('paket_id')->unsigned()->nullable()->after('user_id');
            $table->foreign('paket_id')->references('id')->on('t_paket')->onDelete('cascade');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_transaksi', function($table){
            $table->dropColumn('paket_id');
        });
        //
    }
}
