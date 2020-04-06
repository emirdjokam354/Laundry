<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Outlet;
use App\Pelanggan;
use App\Paket;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $transaksi = Transaksi::all();
        
        return view('transaksi/transaksi', compact('transaksi','pelanggan'));
    }

    public function detail($id)
    {
        $transaksi = Transaksi::where('id',$id)->get();
        $pelanggan = Pelanggan::all();
        $outlet = Outlet::all();

        return view('transaksi/detail_transaksi',compact('transaksi','pelanggan','outlet'));
    }

    public function tambah()
    {
        $outlet = Outlet::all();
        $pelanggan = Pelanggan::all();
        return view('transaksi/tambah_transaksi',compact('outlet','pelanggan'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi cuy',
            'integer' => ':attribute pilih salah satu opsi cuy',
        ];

        $this->validate($request,[
            'id_outlet' => 'required|integer',
            'id_member' => 'required|integer',
        ],$messages);

        $max_ps = Transaksi::max('kode_invoice');
        $increment = $max_ps + 1;
        $transaksi = new Transaksi;
        $transaksi->outlet_id = $request['id_outlet'];
        $transaksi->pelanggan_id = $request['id_member'];
        $transaksi->tgl = $request['tgl'];
        $transaksi->batas_waktu = $request['batas_waktu'];
        $transaksi->kode_invoice = str_pad($increment,7,0, STR_PAD_LEFT);
        $transaksi->status = 'baru';
        $transaksi->dibayar = $request['status_bayar'];
        $transaksi->user_id = Auth::user()->id;
        $transaksi->save();

        return \redirect('/transaksi')->with(['success' => 'Data transaksi berhasil ditambahkan']);
    }

    public function hapus($id)
    {
        Transaksi::where('id',$id)->delete();
        return \redirect('/transaksi')->with(['success' => 'Data transaksi berhasil dihapus']);
    }
    //
}
