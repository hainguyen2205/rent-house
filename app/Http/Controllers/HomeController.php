<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AddressController;

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
        $this->setTitle('Trang chủ');
        $districts = new AddressController();
        return view('home', [
            'districts' => $districts->getAllDistrict(),
            'title' => $this->title,
        ]);
    }
    public function displayLoginForm()
    {
        $this->setTitle('Đăng nhập');
        return view('user.login',[
            'title' => $this->title,
        ]);
    }
    public function displayRegisterForm()
    {
        $this->setTitle('Đăng ký');
        return view('user.register',[
            'title' => $this->title,
        ]);
    }
}
