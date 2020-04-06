<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Outlet;
class KasirController extends Controller
{
    public function index(Request $request){
        $data['kasir'] = User::
        // join('t_outlet','users.id_outlet','=','t_outlet.id')
        where('role','kasir')->get();
        return view('management/kasir/kasir',$data);
    }
    public function tambah(){
        $data['outlet'] = Outlet::all();
        return view('management/kasir/tambah_kasir',$data);
    }
     public function store(Request $data){
        //validate field
        $this->validate($data, [
            'email' => 'required|string',
            'password' => 'required',
            'name' => 'required|string',
            'id_outlet' => 'required|integer',
            'gambar'	=> 'required|file|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);
        //input with image
        $gambar = $data->file('gambar');
        $namaFile = $gambar->getClientOriginalName();
        $data->file('gambar')->move('uploadgambar', $namaFile);

        $user = new User($data->all());
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->name = $data['name'];
        $user->outlet_id = $data['id_outlet'];
        $user->role = "kasir";
        $user->gambar = $namaFile;
        $user->save();

        return redirect('/management/kasir')->with(['success' => 'Data kasir berhasil ditambahkan']);
    }
    public function edit($id){
        $data['kasir'] = User::where('id',$id)->get(); 
        $data['outlet'] = Outlet::all();
        return view('management/kasir/edit_kasir',$data);
    }
    public function update(Request $request){
         $rule = [
            'email' => 'required|string',
            'name'  => 'required|string',
            'id_outlet' => 'required|integer',
            'gambar'	=> 'required|file|image|mimes:jpg,png,jpeg,svg|max:2048',
        ];

        $this->validate($request, $rule);

        //update data admin
        $user = User::find($request->id);
          $user->email = $request['email'];
          $user->password = Hash::make($request['password']);
          $user->name = $request['name'];
          $user->outlet_id = $request['id_outlet'];
          $user->role = "kasir"; 
          if($request->file('gambar') == "")
		{
			$user->gambar = $user->gambar;
		}
		else
		{
			$file = $request->file('gambar');
			$fileName = $file->getClientOriginalName();
			$request->file('gambar')->move('uploadgambar',$fileName);
			$user->gambar = $fileName;
        }
        $user->update(); 
            
        //alihkan ke halaman data admin
        return redirect('/management/kasir')->with(['success' => 'Data kasir berhasil diedit ']);
    }

    public function hapus($id){
        User::where('id',$id)->delete();
        return redirect('management/kasir')->with(['success' => "Data kasir berhasil dihapus"]);
    }
    public function cari(Request $request){
        $cari = $request->cari;

        $data['kasir'] = User::where('name','like',"%".$cari."%")->paginate();
        return view('management/kasir/kasir',$data);

    }

    
    //
}
