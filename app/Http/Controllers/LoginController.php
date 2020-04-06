<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(){
        \DB::table('users')->get();
        return view('authentikasi/login');
    }
    //
}
