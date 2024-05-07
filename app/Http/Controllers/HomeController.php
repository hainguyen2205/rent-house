<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AddressController;
use App\Models\District;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $this->setTitle('Trang chủ');
        $now = Carbon::now();
        $new_posts = Post::orderBy('created_at', 'desc')->where('id_status', '2')->paginate(8);
        $popular_posts =  Post::orderBy('views', 'desc')->where('id_status', '2')->paginate(6);
        return view('home', [
            'districts' => District::get(),
            'title' => $this->title,
            'new_posts' => $new_posts,
            'popular_posts' => $popular_posts,
            'now' => $now
        ]);
    }
    public function displayLoginForm()
    {
        if (Auth::check()) {
            return back();
        }
        $this->setTitle('Đăng nhập');
        return view('user.login',[
            'title' => $this->title,
        ]);
    }
    public function displayRegisterForm()
    {
        if (Auth::check()) {
            return back();
        }
        $this->setTitle('Đăng ký');
        return view('user.register',[
            'title' => $this->title,
        ]);
    }
}
