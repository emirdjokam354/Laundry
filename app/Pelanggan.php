<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 't_member';
    protected $fillable = ['nama','alamat','jenkel','tlp'];
    //

    public function transaksi()
    {
        return $this->hasOne('App\Transaksi'); 
    }
}
