<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Topup_Request;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminTopupController extends Controller
{
    public function __construct()
    {
        $this->obj = new Topup_Request();
    }
    public function displayHistoryTopupPage()
    {
        $topups = $this->obj::all();
        return view('admin.topup.list', [
            'topups' => $topups
        ]);
    }
    public function setTopupSuccess(Request $request)
    {
        $topup = $this->obj->find($request->id);
        if (!$topup) {
            return abort(404);
        }
        DB::beginTransaction();
        try {
            User::where('id', $topup->id_user)->update(['account_balance' => DB::raw('account_balance + ' . (int)$topup->amount)]);
            $topup->status = 'success';
            $topup->save();
            DB::commit();
            Session::flash('success', 'Cập nhật trạng thái thành công');
        } catch (\Throwable $e) {
            DB::rollBack();
            dd($e);
            Session::flash('error', 'Cập nhật trạng thái thái bại');
        }
        return back();
    }
    public function setTopupCancel(Request $request)
    {
        $topup = $this->obj->find($request->id);
        if (!$topup) {
            return abort(404);
        }
        try {
            $topup->status = 'cancellec';
            $topup->save();
            Session::flash('success', 'Cập nhật trạng thái thành công');
        } catch (\Throwable $e) {
            Session::flash('error', 'Cập nhật trạng thái thái bại');
        }
        return back();
    }
}
