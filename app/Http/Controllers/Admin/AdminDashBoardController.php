<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Post;
use App\Models\Topup_Request;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashBoardController extends Controller
{
    //
    public function displayDashBoardPage()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $post_count_this_month = Post::whereYear('created_at', $currentYear)->whereMonth('created_at', $currentMonth)->count();
        $approve_post_count = Post::where('id_status', 2)->whereMonth('created_at', $currentMonth)->count();
        $revenue = Topup_Request::whereMonth('created_at', $currentMonth)->where('status', 'success')->sum('amount');
        $feedback_count_this_month =  Feedback::whereYear('created_at', $currentYear)->whereMonth('created_at', $currentMonth)->count();

        $approve_post_percent = 0;
        if ($post_count_this_month > 0) {
            $approve_post_percent = ($approve_post_count / $post_count_this_month) * 100;
        }
        return view('admin.dashboard', [
            'post_count_this_month' => $post_count_this_month,
            'revenue' => $revenue,
            'approve_post_percent' => intval($approve_post_percent),
            'feedback_count_this_month' => $feedback_count_this_month
        ]);
    }
    public function getMonthlyRevenue(){
        $topup_rq = new Topup_Request();
        $monthly_revenue = $topup_rq->calculateMonthlyRevenue();
        return response()->json(['monthly_revenue' => $monthly_revenue]);
    }
    public function getPostCountByDistrict()
    {
        $post = new Post();
        $post_count_by_district = $post->countPostsByDistrict();
        return response()->json(['post_count' => $post_count_by_district]);
    }
}
