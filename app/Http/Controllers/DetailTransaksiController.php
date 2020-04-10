<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Outlet;
use App\Pelanggan;
use App\Paket;
use App\DetailTransaksi;
use Illuminate\Support\Facades\Auth;
class DetailTransaksiController extends Controller
{
     public function detail($id)
    {
        $detail = DetailTransaksi::all();
        $transaksi = Transaksi::where('id',$id)->get();
        $pelanggan = Pelanggan::all();
        $outlet = Outlet::all();
        $paket = Paket::all();
        
        return view('transaksi/detail_transaksi',compact('transaksi','pelanggan','outlet','paket','detail'));
    }

    public function ProsesTransaksi(Request $request)
    {
        $pesan = [
            'required' => ':attribute wajib diisi',
        ];

        $this->validate($request,[
            'qty' => 'required',
            'id_paket' => 'required',
        ],$pesan);

        $dtltransaksi = DetailTransaksi::all();
        $transaksi = Transaksi::where('id',$request->id)->update([
            'status' => $request->status,
            'dibayar' => $request->dibayar,
        ]);

        $detail = new DetailTransaksi;
        // $detail->transaksi_id = $transaksi;
        $detail->transaksi_id = $request['id_transaksi'];
        $detail->paket_id = $request['id_paket'];
        $detail->qty = $request['qty'];
        $detail->keterangan = $request['keterangan'];
        $detail->save();

        return \redirect('/transaksi');
    }
    //
}
