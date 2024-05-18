<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class AdminFeedbackController extends Controller
{
    public function displayFeedbacks()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedback.list', [
            'feedbacks' => $feedbacks,
        ]);
    }
}
