<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 't_paket';
    protected $fillable = ['id_outlet','nm_paket','jenis','harga'];
    //

    public function detail_transaksi()
    {
        return $this->hasMany('App\DetailTransaksi');
    }
}
