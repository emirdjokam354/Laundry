<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{

    protected $table = 't_detail_transaksi';
    protected $fillable = ['transaksi_id','paket_id','qty','keterangan'];

    public function transaksi()
    {
        return $this->belongsTo('App\Transaksi');
    }

    public function paket()
    {
        return $this->belongsTo('App\Paket');
    } 

}
