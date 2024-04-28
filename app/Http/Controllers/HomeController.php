<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AddressController;
use App\Models\Post;
use Carbon\Carbon;

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
        $now = Carbon::now();
        $districts = new AddressController();
        $new_posts = Post::orderBy('created_at', 'desc')->where('id_status', '2')->paginate(8);
        $popular_posts =  Post::orderBy('views', 'desc')->where('id_status', '2')->paginate(6);
        return view('home', [
            'districts' => $districts->getAllDistrict(),
            'title' => $this->title,
            'new_posts' => $new_posts,
            'popular_posts' => $popular_posts,
            'now' => $now
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
