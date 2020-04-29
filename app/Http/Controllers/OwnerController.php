<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Outlet;
class OwnerController extends Controller
{
    public function index(){
        $data['owner'] = User::where('role','owner')->get();
        return view('management/owner/owner',$data);
    }
    public function tambah(){
        $data['outlet'] = Outlet::all();
        return view('management/owner/tambah_owner',$data);
    }

    public function store(Request $request){
        //validate field
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required',
            'name' => 'required|string',
            'id_outlet' => 'required|integer',
            'gambar'	=> 'required|file|image|mimes:jpg,png,jpeg,svg|max:2048',
        ]);
        
        //input with image
        $gambar = $request->file('gambar');
        $namaFile = $gambar->getClientOriginalName();
        $request->file('gambar')->move('uploadgambar', $namaFile);

        $user = new User($request->all());
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->showpassword = $request['password'];
        $user->name = $request['name'];
        $user->outlet_id = $request['id_outlet'];
        $user->role = "owner";
        $user->gambar = $namaFile;
        $user->save();

        return redirect('/management/owner')->with(['success' => 'Data owner berhasil ditambahkan']);
    }

    public function edit(Request $request, $id){
        $data['owner'] = User::where('id',$id)->get();
        $data['outlet'] = Outlet::all();
        return view('management/owner/edit_owner',$data);
    }

    public function update(Request $request)
    {

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
          $user->password = $request['password'];
          $user->name = $request['name'];
          $user->outlet_id = $request['id_outlet'];
          $user->role = "owner"; 
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
        return redirect('/management/owner')->with(['success' => 'Data owner berhasil diedit ']);
    }

    public function hapus($id){
        User::where('id',$id)->delete();
        return redirect('/management/owner')->with(['success' => 'Data owner berhasil dihapus']);
    }
    public function cari(Request $request){
        $cari = $request->cari;

        $data['owner'] = User::where('name','like',"%".$cari."%")->paginate();
        return view('management/owner/owner',$data);

    }
    //
}
