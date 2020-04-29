<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = User::all();
        return view('profile/profile',compact('profile'));
    }
    //

    public function editProfile(Request $request,$id)
    {
        //  $rule = [
        //     'name'     => 'required|string',
        //     'email'    => 'required|string',
        //     'password' => 'required|string|confirmed',
        //     'gambar'   => 'file|image|mimes:jpg,png,jpeg,svg|max:2048'
        // ];
        // $this->validate($request, $rule);

        $user = User::find(Auth::user()->id);
        $user->email = $request['email'];
        $user->name = $request['username'];
        // $user->password = Hash::make($request['password']);
        // $user->showpassword = $request['password'];
        $user->alamat = $request['alamat'];
        $user->tlp = $request['tlp'];
        $user->jenkel = $request['jenkel'];

        if ($user->gambar != null) {
            $user->gambar = $user->gambar;
        } else {
            $user->gambar = $request->gambar;
        }
        if ($request->file('gambar') == "") {
            $user->gambar = $user->gambar;
        } else {
            $file = $request->file('gambar');
            $fileName = $file->getClientOriginalName();
            $request->file('gambar')->move('uploadgambar',$fileName);
            $user->gambar = $fileName;
        }

        $user->update();
        
        return redirect('/dashboard');
    }
}
