<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 't_paket';
    protected $fillable = ['outlet_id','nm_paket','jenis','harga'];
    //

    public function detail_transaksi()
    {
        return $this->hasMany('App\DetailTransaksi');
    }

    public function outlet()
    {
        return $this->belongsTo('App\Outlet');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }
}
