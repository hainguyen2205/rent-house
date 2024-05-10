<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Http\Requests\UserRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(UserRequest $request)
    {
        $credentials = $request->only('phone', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == '1') return redirect('/admin');
            return redirect('/')->with('success', 'Đăng nhập thành công!');
        }
        return redirect()->back()->with('incorrect', 'Số điện thoại hoặc mật khẩu không chính xác');
    }
    public function register(UserRequest $request)
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
        $this->setTitle('Thông tin cá nhân');
        $approved_post_count = Post::where('id_status', '2')->where('id_user', Auth::user()->id)->count();
        $pending_post_count = Post::where('id_status', '1')->where('id_user', Auth::user()->id)->count();
        $rejected_post_count = Post::where('id_status', '0')->where('id_user', Auth::user()->id)->count();
        return view('user.index', [
            'titel' => $this->title,
            'approved_post_count' => $approved_post_count,
            'pending_post_count' => $pending_post_count,
            'rejected_post_count' => $rejected_post_count
        ]);
    }
    public function showEditForm()
    {
        $this->setTitle('Thông tin cá nhân');
        return view('user.edit', [
            'title' => $this->title,
        ]);
    }
    public function showPosts($status)
    {
        $this->setTitle('Bài đăng đã duyệt');
        $id_status_map = [
            'approved' => 2,
            'pending' => 1,
            'rejected' => 0,
        ];
        $title_status_map = [
            'approved' => 'đã duyệt',
            'pending' => 'đang chờ',
            'rejected' => 'bị từ chối',
        ];
        $id_status = $id_status_map[$status] ?? null;
        $title_status = $title_status_map[$status] ?? null;
        if (!array_key_exists($status, $id_status_map)) {
            return abort(404);
        }
        $posts = Post::where('id_status', $id_status)->where('id_user', Auth::user()->id)->get();
        return view('user.posts', [
            'title' => $this->title,
            'posts' => $posts,
            'title_status' => $title_status,
        ]);
    }
    public function updateUserInfo(UserRequest $userInfoRequest)
    {
        if ($userInfoRequest->password != '') {
            $userInfoRequest->merge(['password' => Hash::make($userInfoRequest->password)]);
        }
        $data = $userInfoRequest->except(['_method', '_token', 'repassword']);
        $updateData = [];
        foreach ($data as $key => $value) {
            if ($value !== null) {
                $updateData[$key] = $value;
            }
        }
        try {
            User::where('id', Auth::user()->id)->update($updateData);
            return redirect()->back()->with('success', 'Đã cập nhật thông tin');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Cập nhật thông tin thất bại');
        }
    }
}
