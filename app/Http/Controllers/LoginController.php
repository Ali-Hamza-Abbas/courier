<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::user()){
            return redirect()->route('dashboard.index');
        }
        return view('login.index');
    }
    public function login(Request $request){
        $credentials = ['email'=>$request->email , 'password' => $request->password];
        if (Auth::attempt($credentials)) {
            return response()->json(["success" => "Login Successfully"]);
        } else {
            return response()->json(["error"=> "Wrong Email or password"]);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
