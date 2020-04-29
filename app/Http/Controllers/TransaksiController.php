<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Outlet;
use App\Pelanggan;
use App\Paket;
use App\DetailTransaksi;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $transaksi = Transaksi::orderBy('created_at','asc')->paginate(5);
        
        return view('transaksi/transaksi', compact('transaksi','pelanggan'));
    }

    public function edit($id)
    {
        $transaksi = Transaksi::where('id',$id)->get();
        $pelanggan = Pelanggan::all();
        $paket = Paket::all();
        $outlet = Outlet::all();

        return view('transaksi/edit_transaksi',compact('transaksi','pelanggan','outlet','paket'));
    }


    public function tambah()
    {
        $outlet = Outlet::all();
        $pelanggan = Pelanggan::all();
        $paket= Paket::all();
        return view('transaksi/tambah_transaksi',compact('outlet','pelanggan','paket'));
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
        $detail = DetailTransaksi::all();
        $transaksi = new Transaksi;
        $transaksi->outlet_id = $request['id_outlet'];
        $transaksi->pelanggan_id = $request['id_member'];
        $mulaitransaksi = $transaksi->created_at;
        $transaksi->tgl = $request['tgl'];
        $batas = $transaksi->batas_waktu = $request['batas_waktu'];
        $transaksi->tgl_bayar = $batas;
        $transaksi->kode_invoice = str_pad($increment,7,0, STR_PAD_LEFT);
        $transaksi->status = 'baru';
        $transaksi->dibayar = $request['status_bayar'];
        $transaksi->biaya_tambahan = $request['biaya_tambahan'];
        $transaksi->diskon = $request['diskon'];
        $transaksi->pajak = $request['pajak'];
        $transaksi->qty = $request['berat'];
        $transaksi->user_id = Auth::user()->id;
        $transaksi->paket_id = $request['paket'];
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
