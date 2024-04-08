<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

 
    public function index()
    {
        $this->addJs('main.js');
        return view('home',[
            'jss' => $this->jss,
        ]);
    }
    public function displayLoginForm()
    {
        $this->addJs('login.js');
        return view('user.login',[
            'jss' => $this->jss,
        ]);
    }
    public function displayRegisterForm()
    {
        $this->addJs('login.js');
        return view('user.register',[
            'jss' => $this->jss,
        ]);
    }
}
