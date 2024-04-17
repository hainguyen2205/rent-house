<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['phone'=>$request->phone, 'password'=>$request->password])){
            return redirect('/');
        }
        return redirect()->back();
    }
    public function register(Request $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        try {
            User::create($request->all());
        } catch (\Throwable $e) {
            dd($e);
        }
        return redirect('/login');
    }
    public function logout()
    {
      Auth::logout();
      return redirect('/login');
    }
    public function index()
    {
        return view('user.index');
    }
     public function edit()
    {
        return view('user.edit');
    }
}
