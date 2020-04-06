<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use App\Paket;

class PaketController extends Controller
{
    public function index()
    {
        $data['paket'] = Paket::
        join('t_outlet','t_paket.id_outlet', '=','t_outlet.id')->paginate(5);
        return view('paket/paket',$data);
    }

    public function tambah(){
        $data['outlet'] = Outlet::all();
        return view('paket/tambah_paket',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'id_outlet' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
        ]);

        $paket = new Paket;
        $paket->id_outlet = $request['id_outlet'];
        $paket->nm_paket = $request['nm_paket'];
        $paket->jenis = $request['jenis'];
        $paket->harga = $request['harga'];
        $paket->save();

        return \redirect('/paket')->with(['success' => 'Data paket berhasil ditambahkan']);
    }

    public function edit($id){
        $data['paket'] = Paket::where('id',$id)->get();
        $data['outlet'] = Outlet::all();
        return view('paket/edit_paket',$data);
    }
    public function update(Request $request)
    {

        $messages = [
            'required' => ':attribute wajib diisi',
            'integer' => ':attribute paket wajib diisi',
            'numeric' => ':attribute harus diisi dengan angka'
        ];

        $this->validate($request,[
            'id_outlet' => 'required|integer',
            'jenis' => 'required|integer',
            'harga' => 'required|numeric',
        ], $messages);

        Paket::where('id',$request->id)->update([
            'id_outlet' => $request->id_outlet,
            'jenis' => $request->jenis,
            'nm_paket' => $request->nm_paket,
            'harga' => $request->harga,
        ]);

        return \redirect('/paket')->with(['success' => 'Data paket berhasil diedit']);
    }

    // public function destroy(Request $request)
    // {
    //     $paket = Paket::findOrfall($request->id);
    //     $paket->delete();
    //     return back();
    // }

    public function hapus($id)
    {
        Paket::where('id',$id)->delete();
        return \redirect('/paket')->with(['success' => 'Data paket berhasil diedit']);
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $data['paket'] = Paket::where('nm_paket','like','%'.$cari.'%')
        ->orwhere('jenis','like','%'.$cari.'%')->paginate();
        return view('paket/paket',$data);
    }
    
    //
}
