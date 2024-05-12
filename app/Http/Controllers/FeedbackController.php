<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    public function createFeedback(FeedbackRequest $request)
    {   
        $feedback = [
            'id_user' => Auth::user()->id,
        ];
        $requestData = $request->except('_token');
        $feedback = array_merge($feedback, $requestData);        
        try {
            Feedback::create($feedback);
            Session::flash('success', 'Phản hồi đã được gửi thành công');
        } catch (\Throwable $e) {
            dd($e);
            Session::flash('error', 'Đã xảy ra lỗi khi gửi phản hồi');
        }
        return back();
    }
}
