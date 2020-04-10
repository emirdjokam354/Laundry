<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\User;
use App\Transaksi;
class BerandaController extends Controller
{
    public function index()
    {
        $data['totalPelanggan'] = Pelanggan::count();
        $data['totalKaryawan'] = User::where('role','kasir')->count();
        $data['newOrder'] = Transaksi::where('status','baru')->count();
        $data['totalOrder'] = Transaksi::count();
        $data['transaksi'] = Transaksi::where('status','baru')->orderBy('created_at','desc')->paginate(5);
        return view('beranda/dashboard',$data);
    }
    //
}
