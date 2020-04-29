<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    //deklarasi tabel
    protected $table = "t_outlet";
    protected $fillable = ['nama','alamat','tlp','gambar'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }

    public function paket()
    {
        return $this->hasMany('App\Paket');
    }
}
