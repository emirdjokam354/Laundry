<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\User;

class BerandaController extends Controller
{
    public function index()
    {
        $totalPelanggan = Pelanggan::count();
        $totalKaryawan = User::where('role','kasir')->count();
        return view('beranda/dashboard',compact('totalPelanggan','totalKaryawan'));
    }
    //
}
