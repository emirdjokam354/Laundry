<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 't_transaksi';
    protected $fillable = ['id_outlet','kode_invoice','id_member','tgl','batas_waktu','tgl_bayar'
    ,'biaya_tambahan','diskon','pajak','status','dibayar','id_user'];
    //

    public function pelanggan()
    {
        return $this->belongsTo('App\Pelanggan');
    }
    public function outlet()
    {
        return $this->belongsTo('App\Outlet');
    }

    public function detail_transaksi()
    {
        return $this->hasOne('App\DetailTransaksi');
    }

    public function paket()
    {
        return $this->belongsTo('App\Paket');
    }

}
