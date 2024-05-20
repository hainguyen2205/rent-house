<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Reply_Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminFeedbackController extends Controller
{
    public function displayFeedbacks()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedback.list', [
            'feedbacks' => $feedbacks,
        ]);
    }
    public function getFeedback(Request $request)
    {
        $feedbackId = $request->input('id');
        $feedback = Feedback::with('getReply')->find($feedbackId);
        // dd($feedback);
        if ($feedback) {
            return response()->json($feedback);
        } else {
            return response()->json(['error' => 'Feedback not found']);
        }
    }
    public function replyFeedback(Request $request)
    {
        try {
            Reply_Feedback::create($request->all());
            Session::flash('success', 'Trả lời phản hồi thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Đã xảy ra lỗi khi trả lời'.$th);
        }
        return back();
    }
}
