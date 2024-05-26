<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Log;
use PayOS\PayOS;

class VietQrService
{
    protected $obj;
    protected $payOSClientId;
    protected $payOSApiKey;
    protected $payOSChecksumKey;
    public function __construct()
    {
        $this->payOSClientId = env('PAYOS_CLIENT_ID');
        $this->payOSApiKey = env('PAYOS_API_KEY');
        $this->payOSChecksumKey = env('PAYOS_CHECKSUM_KEY');
        $this->obj = new PayOS($this->payOSClientId, $this->payOSApiKey, $this->payOSChecksumKey);
    }
    public function createPayMentLink($topup_request)
    {
        $url = null;
        $data = [
            'orderCode' => $topup_request->id,
            'amount' => intval($topup_request->amount),
            'description' => 'payment nhachothue ' . $topup_request->id,
            'returnUrl' => route('vietqr-return'),
            'cancelUrl' => route('vietqr-return')
        ];
        try {
            $response = $this->obj->createPaymentLink($data);
            $url = $response['checkoutUrl'];
        } catch (\Throwable $th) {
            Log::error('Error creating payment link: ' . $th->getMessage());
            $url = 'fail';
        }
        return $url;
    }
    public function cancelPaymentLink($request)
    {
        $orderCode = $request->input('orderCode');
        $reason = 'Canncel';
        try {
            $response = $this->obj->cancelPaymentLink($orderCode, $reason);
            return $response;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function verifyPayment($request)
    {
        $result = null;
        $orderCode = $request->input('orderCode');
        $response = $this->obj->getPaymentLinkInformation($orderCode);
        if ($response['status'] == 'PAID') {
            $result = 'success';
        } else if ($response['status'] == 'CANCELLED') {
            $result = 'cancelled';
        } else {
            $result = 'fail';
        }
        return $result;
    }
}
