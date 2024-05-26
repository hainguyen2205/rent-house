<?php

namespace App\Http\Controllers;

use App\Mail\PostStatusNotify;
use Illuminate\Http\Request;
use App\Http\Controllers\AddressController;
use App\Models\District;
use App\Models\Post;
use App\Models\TypeHouse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $this->setTitle('Trang chủ');
        $now = Carbon::now();
        $new_posts = Post::orderBy('created_at', 'desc')->where('id_status', '2')->paginate(8);
        $popular_posts =  Post::orderBy('views', 'desc')->where('id_status', '2')->paginate(6);
        $post_count = [
            'thainguyen' => Post::where('id_status', '2')->where('id_district', '1')->count(),
            'songcong' => Post::where('id_status', '2')->where('id_district', '2')->count(),
            'phoyen' => Post::where('id_status', '2')->where('id_district', '8')->count(),
            'phubinh' => Post::where('id_status', '2')->where('id_district', '9')->count(),
            'daitu' => Post::where('id_status', '2')->where('id_district', '7')->count(),
        ];
        return view('home', [
            'districts' => District::all(),
            'type_houses' => TypeHouse::all(),
            'title' => $this->title,
            'new_posts' => $new_posts,
            'popular_posts' => $popular_posts,
            'now' => $now,
            'post_count' => $post_count
        ]);
    }
    public function displayLoginForm()
    {
        if (Auth::check()) {
            return back();
        }
        $this->setTitle('Đăng nhập');
        return view('user.login', [
            'title' => $this->title,
        ]);
    }
    public function displayRegisterForm()
    {
        if (Auth::check()) {
            return back();
        }
        $this->setTitle('Đăng ký');
        return view('user.register', [
            'title' => $this->title,
        ]);
    }
    public function displayNewsPage()
    {
        $this->setTitle('Tin tức và kinh nghiệm');
        $new_posts = Post::orderBy('created_at', 'desc')->where('id_status', '2')->paginate(5);
        return view('news.list', [
            'title' => $this->title,
            'posts' => $new_posts
        ]);
    }
    public function displayShareTipsPage()
    {
        $this->setTitle('Tin tức và kinh nghiệm');
        $new_posts = Post::orderBy('created_at', 'desc')->where('id_status', '2')->paginate(5);
        return view('news.share-tips', [
            'title' => $this->title,
            'posts' => $new_posts
        ]);
    }
    public function displayScamWarningPage()
    {
        $this->setTitle('Tin tức và kinh nghiệm');
        $new_posts = Post::orderBy('created_at', 'desc')->where('id_status', '2')->paginate(5);
        return view('news.scam-warnings', [
            'title' => $this->title,
            'posts' => $new_posts
        ]);
    }
    public function displayTipsPostingPage()
    {
        $this->setTitle('Tin tức và kinh nghiệm');
        $new_posts = Post::orderBy('created_at', 'desc')->where('id_status', '2')->paginate(5);
        return view('news.tips-for-posting', [
            'title' => $this->title,
            'posts' => $new_posts
        ]);
    }
    public function displayPostingRulesPage()
    {
        $this->setTitle('Tin tức và kinh nghiệm');
        $new_posts = Post::orderBy('created_at', 'desc')->where('id_status', '2')->paginate(5);
        return view('news.posting-rules', [
            'title' => $this->title,
            'posts' => $new_posts
        ]);
    }
    public function displayFaqPage()
    {
        $this->setTitle('Tin tức và kinh nghiệm');
        $new_posts = Post::orderBy('created_at', 'desc')->where('id_status', '2')->paginate(5);
        return view('news.faq', [
            'title' => $this->title,
            'posts' => $new_posts
        ]);
    }
}
