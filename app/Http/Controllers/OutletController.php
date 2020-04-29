<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;

class OutletController extends Controller
{
    public function index(){
        $data['outlet'] = Outlet::paginate(5);
        return view('outlet/outlet',$data); 
    }

    public function tambah(){
        return view('outlet/tambah_outlet');
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'tlp' => 'required',
        ]);

        $gambar = $request->file('gambar');
        $namafile = $gambar->getClientOriginalName();
        $request->file('gambar')->move('uploadgambar',$namafile);
        $outlet = new Outlet($request->all());
        $outlet->nama = $request['nama'];
        $outlet->alamat = $request['alamat'];
        $outlet->tlp = $request['tlp'];
        $outlet->gambar = $namafile;
        $outlet->save();

        return \redirect('/outlet')->with(['success' => 'Data outlet berhasil ditambahkan']);
    }

    public function edit($id){
        $data['outlet'] = Outlet::where('id',$id)->get();
        return view('outlet/edit_outlet',$data);
    }

    public function update(Request $request){
        $this->validate($request,[
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'tlp' => 'required',
        ]);

        $outlet = Outlet::find($request->id);
            $outlet->nama = $request['nama'];
            $outlet->alamat = $request['alamat'];
            $outlet->tlp = $request['tlp'];
            if ($request->file('gambar') == "") 
            {
               $outlet->gambar = $outlet->gambar; 
            } else {
                $file = $request->file('gambar');
                $filename = $file->getClientOriginalName();
                $request->file('gambar')->move('uploadgambar',$filename);
                $outlet->gambar = $filename;
            }
            $outlet->update();
            
        

        return \redirect('/outlet')->with(['success' => 'Data outlet berhasil diedit']);
    }

    public function hapus($id){
        $outlet = Outlet::where('id',$id)->delete();
        return \redirect('/outlet')->with(['success' => 'Data outlet berhasil dihapus']);
    }

    public function cari(Request $request){
        $cari = $request->cari;
        $data['outlet'] = Outlet::where('nama','like','%'.$cari.'%')->paginate();
        return view('outlet/outlet',$data);
    }
    //
}
