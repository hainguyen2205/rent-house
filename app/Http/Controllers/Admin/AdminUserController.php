<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserInfoRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->obj = new User();
    }
    public function displayUsersPage()
    {
        $users = $this->obj::where('status_of_account', '<>', '2')->paginate(10);
        return view('admin.users', [
            'users' => $users,
        ]);
    }
    public function updateStatus($id_user, $id_status)
    {
        $user = $this->obj::findOrFail($id_user);
        $user->update(['status_of_account' => $id_status]);
    }
    public function getUser(Request $request)
    {
        $userId = $request->input('id');
        $user = $this->obj::find($userId);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'User not found']);
        }
    }
    public function createUser(UserRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        try {
            $this->obj::create($request->all());
            Session::flash('success', 'Thêm người dùng mới thành công');  
        } catch (\Throwable $e) {
            // dd('hehe');
            Session::flash('error', 'Thêm người dùng mới người dùng thất bại');
        }
        return back();
    }
    public function deleteUser($id_user)
    {
        try {
            $this->updateStatus($id_user, 2);
            Session::flash('success', 'Xóa người dùng thành công');
        } catch (\Throwable $e) {
            Session::flash('error', 'Đã xảy ra lỗi khi xóa người dùng');
        }
        return back();
    }
    public function updateUser(UserRequest $userInfoRequest)
    {
        if ($userInfoRequest->password != null) {
            $userInfoRequest->merge(['password' => Hash::make($userInfoRequest->password)]);
        }
        $data = $userInfoRequest->except(['_method', '_token', 'repassword', 'id']);
        $updateData = [];
        foreach ($data as $key => $value) {
            if ($value !== null) {
                $updateData[$key] = $value;
            }
        }
        try {
            $this->obj::where('id', $userInfoRequest->id)->update($updateData);
            Session::flash('success', 'Đã cập nhật thông tin');
        } catch (\Throwable $th) {
            Session::flash('error', 'Cập nhật thông tin thất bại');
        }
        return back();
    }
}
