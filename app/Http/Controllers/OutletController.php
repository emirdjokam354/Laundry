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

        $outlet = new Outlet;
        $outlet->nama = $request['nama'];
        $outlet->alamat = $request['alamat'];
        $outlet->tlp = $request['tlp'];
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

        Outlet::where('id',$request->id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tlp' => $request->tlp,
        ]);

        return \redirect('/outlet')->with(['success' => 'Data outlet berhasil diedit']);
    }

    public function destory($id){
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
