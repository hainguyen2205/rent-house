<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserInfoRequest;
use App\Http\Requests\UserRequest;
use App\Models\Gender;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login(UserRequest $request)
    {
        $credentials = $request->only('phone', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->status_of_account == 0) {
                $blockReasons = $user->blockReason;
                if ($blockReasons->isNotEmpty()) {
                    Auth::logout();
                    $reason = $blockReasons[0]->reason;
                    return redirect()->back()->with('error', 'Tài khoản của bạn đã bị khóa. Lý do: ' . $reason);
                } else {
                    Auth::logout();
                    return redirect()->back()->with('error', 'Tài khoản của bạn đã bị khóa.');
                }
            }
            elseif ($user->status_of_account == 2) {
                Auth::logout();
                return redirect()->back()->with('error', 'Tài khoản của bạn đã bị xóa. Vui lòng liên hệ quản trị viên để biết thêm chi tiết.');
            }

            if ($user->role == '1') {
                return redirect('/admin');
            } else {
                return redirect('/')->with('success', 'Đăng nhập thành công!');
            }
        }
        return redirect()->back()->with('incorrect', 'Số điện thoại hoặc mật khẩu không chính xác');
    }
    public function register(UserRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        try {
            User::create($request->all());
            return redirect('/login')->with('success', 'Đăng ký thành công!');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Đăng ký thất bại!');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function index()
    {
        $this->setTitle('Thông tin cá nhân');
        return view('user.index');
    }
    public function showEditForm()
    {
        $this->setTitle('Thông tin cá nhân');
        return view('user.edit', [
            'title' => $this->title,
            'genders' => Gender::all(),
        ]);
    }
    public function showPosts($status)
    {
        $this->setTitle('Bài đăng cá nhân');
        $id_status_map = [
            'approved' => 2,
            'pending' => 1,
            'rejected' => 0,
        ];
        $title_status_map = [
            'approved' => 'đã duyệt',
            'pending' => 'đang chờ duyệt',
            'rejected' => 'bị từ chối',
        ];
        if (!array_key_exists($status, $id_status_map)) {
            return abort(404);
        }
        $id_status = $id_status_map[$status];
        $title_status = $title_status_map[$status];

        $posts = Post::where('id_status', $id_status)->where('id_user', Auth::user()->id)->paginate(5);
        return view('user.post.list', [
            'title' => $this->title,
            'posts' => $posts,
            'title_status' => $title_status,
        ]);
    }
    public function postIndex()
    {
        $userId = Auth::user()->id;
        $postCounts = Post::where('id_user', $userId)->selectRaw('id_status, COUNT(*) as count')->groupBy('id_status')->pluck('count', 'id_status');
        $approved_post_count = $postCounts->get(2, 0);
        $pending_post_count = $postCounts->get(1, 0);
        $rejected_post_count = $postCounts->get(0, 0);
        return view('user.post.index', [
            'title' => $this->title,
            'approved_post_count' => $approved_post_count,
            'pending_post_count' => $pending_post_count,
            'rejected_post_count' => $rejected_post_count
        ]);
    }
    public function updateUserInfo(UserRequest $userInfoRequest)
    {
        if ($userInfoRequest->password != '') {
            $userInfoRequest->merge(['password' => Hash::make($userInfoRequest->password)]);
        }
        $data = $userInfoRequest->except(['_method', '_token', 'repassword']);
        $updateData = array_filter($data, function ($value) {
            return !is_null($value);
        });
        try {
            User::where('id', Auth::user()->id)->update($updateData);
            Session::flash('success', 'Đã cập nhật thông tin');
        } catch (\Throwable $th) {
            Session::flash('error', 'Cập nhật thông tin thất bại');
        }
        return back();
    }
}
