<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopupRequest;
use App\Http\Services\VnPayService;
use App\Http\Services\VietQrService;
use App\Models\Topup_Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    protected $vietQrService;
    protected $vnpayService;
    public function __construct(VnPayService $vnPayService, VietQrService $vietQrService)
    {
        $this->vnpayService = $vnPayService;
        $this->vietQrService = $vietQrService;
    }
    public function vnpayCheckOut(TopupRequest $request)
    {
        $topup_request = Topup_Request::create(['id_user' => Auth::user()->id, 'amount' => $request->amount, 'method' => $request->input('method')]);
        $topup_request_id = $topup_request->id;

        $url = $this->vnpayService->createPaymentLink($request, $topup_request_id);

        return redirect($url)->with('topup_id', $topup_request_id);
    }
    public function vnpayGetResult(Request $request)
    {
        $rs_session_value = null;
        $result = $this->vnpayService->verifyPaymentWebhookData($request);

        $topup_id = session('topup_id');
        $amount = $request->vnp_Amount / 100;

        if ($result) {
            Topup_Request::where('id', $topup_id)->update(['status' => 'success']);
            User::where('id', Auth::user()->id)->update(['account_balance' => DB::raw('account_balance + ' . $amount)]);
            Session::flash('success', 'Thanh toán thành công');
            $rs_session_value = 'success';
        } else {
            Topup_Request::where('id', $topup_id)->update(['status' => 'fail']);
            Session::flash('error', 'Thanh toán thất bại');
            $rs_session_value = 'fail';
        }
        return redirect('profile/topup')->with('result', $rs_session_value);
    }
    public function vietqrCheckOut(TopupRequest $request)
    {
        $topup_request = Topup_Request::create(['id_user' => Auth::user()->id, 'amount' => $request->amount, 'method' => $request->input('method')]);

        $url = $this->vietQrService->createPayMentLink($topup_request);
        if ($url == 'fail') {
            return back()->with('error', 'Lỗi khi tạo link thanh toán');
        }
        return redirect($url);
    }
    public function vietqrGetResult(Request $request)
    {
        $rs_session_value = null;

        $topup_request = Topup_Request::find($request->orderCode);
        $topup_id = $topup_request->id;
        $amount = $topup_request->amount;

        $result = $this->vietQrService->verifyPayment($request);
        if ($result == 'success') {
            Topup_Request::where('id', $topup_id)->update(['status' => 'success']);
            User::where('id', Auth::user()->id)->update(['account_balance' => DB::raw('account_balance + ' . $amount)]);
            Session::flash('success', 'Thanh toán thành công');
            $rs_session_value = 'success';
        } else {
            Topup_Request::where('id', $topup_id)->update(['status' => $result]);
            if ($result == 'cancelled') {
                $rs_session_value = 'cancelled';
            } else {
                $rs_session_value = 'fail';
            }
            Session::flash('error', 'Thanh toán thất bại');
        }
        return redirect('profile/topup')->with('result', $rs_session_value);
    }
    public function vietqrCancelPayment(Request $request)
    {
    }
}
