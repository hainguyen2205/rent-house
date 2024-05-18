<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Block_User;
use App\Models\Gender;
use App\Models\Role;
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
        $users = $this->obj::where('status_of_account', '<>', '2')->get();
        return view('admin.user.list', [
            'users' => $users,
        ]);
    }
    public function displayUpdateUser($id_user)
    {
        $user = $this->obj::findOrFail($id_user);
        if (!$user) {
            return abort(404);
        }
        return view('admin.user.edit', [
            'genders' => Gender::all(),
            'roles' => Role::all(),
            'user' => $user,
        ]);
    }
    public function displayCreateUser()
    {
        return view('admin.user.create', [
            'genders' => Gender::all(),
            'roles' => Role::all(),
        ]);
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
            Session::flash('error', 'Thêm người dùng mới người dùng thất bại');
        }
        return back();
    }
    public function deleteUser(Request $request)
    {
        $id_user = $request->id;

        if (!$id_user) {
            Session::flash('error', 'Đã xảy ra lỗi khi xóa người dùng');
            return back();
        }
        try {
            $user = User::findOrFail($id_user);
            $user->update(['status_of_account' => '2']);
            Session::flash('success', 'Xóa người dùng thành công');
        } catch (\Throwable $e) {
            Session::flash('error', 'Đã xảy ra lỗi khi xóa người dùng');
        }
        return back();
    }
    public function blockUser(Request $request)
    {
        $id_user = $request->id;
        if (!$id_user) {
            Session::flash('error', 'Đã xảy ra lỗi khi khóa tài khoản');
            return back();
        }
        try {
            $user = User::findOrFail($id_user);
            $user->update(['status_of_account' => '0']);
            Block_User::create(['id_user' => $user->id, 'reason' => $request->reason]);
            Session::flash('success', 'Khóa tài khoản thành công');
        } catch (\Throwable $e) {
            Session::flash('error', 'Đã xảy ra lỗi khi khóa tài khoản');
        }
        return back();
    }
    public function unblockUser(Request $request)
    {
        $id_user = $request->id;
        if (!$id_user) {
            Session::flash('error', 'Đã xảy ra lỗi khi mở khóa tài khoản');
            return back();
        }
        try {
            $user = User::findOrFail($id_user);
            $user->update(['status_of_account' => '1']);
            Block_User::where('id_user', $user->id)->delete();
            Session::flash('success', 'Mở khóa tài khoản thành công');
        } catch (\Throwable $e) {
            Session::flash('error', 'Đã xảy ra lỗi khi khóa tài khoản');
        }
        return back();
    }

    public function updateUser(UserRequest $userInfoRequest)
    {

        if ($userInfoRequest->password != null) {
            $userInfoRequest->merge(['password' => Hash::make($userInfoRequest->password)]);
        }
        $data = $userInfoRequest->except(['_method', '_token', 'id']);
        $updateData = [];
        foreach ($data as $key => $value) {
            if ($value !== null) {
                $updateData[$key] = $value;
            }
        }
        try {
            $this->obj::where('id', $userInfoRequest->id)->update($updateData);
            Session::flash('success', 'Đã cập nhật thông tin');
            return redirect('/admin/user/list');
        } catch (\Throwable $th) {
            Session::flash('error', 'Cập nhật thông tin thất bại');
            return back();
        }
    }
}
