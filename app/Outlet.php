<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    //deklarasi tabel
    protected $table = "t_outlet";

    public function users()
    {
        return $this->hasOne('App\User');
    }

    public function transaksi()
    {
        return $this->hasMany('App\Transaksi');
    }
}
