<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class PelangganController extends Controller
{
    public function index(){
        $data['pelanggan'] = Pelanggan::all();
        return view('pelanggan/pelanggan',$data);
    }

    public function tambah(){
        $data['pelanggan'] = Pelanggan::all();
        return view('pelanggan/tambah_pelanggan',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'jenkel' => 'required',
            'tlp' => 'required',
        ]);

        $pelanggan = new Pelanggan;
        $pelanggan->nama = $request['nama'];
        $pelanggan->alamat = $request['alamat'];
        $pelanggan->jenkel = $request['jenkel'];
        $pelanggan->tlp = $request['tlp'];
        $pelanggan->save();

        return redirect('/pelanggan')->with(['success' => "Data pelanggan berhasil ditambahkan"]);
    }

    public function edit($id){
        $data['pelanggan'] = Pelanggan::where('id',$id)->get();
        return view('pelanggan/edit_pelanggan',$data);
    }

    public function update(Request $request){
        $this->validate($request, [
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'tlp' => 'required',
            'jenkel' => 'required',
        ]);

        Pelanggan::where('id',$request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenkel' => $request->jenkel,
            'tlp' => $request->tlp,
        ]);

        return \redirect('/pelanggan')->with(['success' => 'Data pelanggan berhasil diedit']);
    }

    public function hapus($id){
        Pelanggan::where('id',$id)->delete();
        return \redirect('/pelanggan')->with(['success' => 'Data pelanggan berhasil diedit']);

    }

    public function cari(Request $request){
        $cari = $request->cari;
        $data['pelanggan'] = Pelanggan::where('nama','like','%'.$cari.'%')->paginate();
        return view('pelanggan/pelanggan',$data);
    }

    //
}
