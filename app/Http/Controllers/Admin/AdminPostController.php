<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminPostController extends Controller
{
    public function __construct()
    {
        $this->obj = new Post();
    }
    public function displayPostsPage($status)
    {
        $id_status_map = [
            'approved' => 2,
            'pending' => 1,
            'rejected' => 0,
        ];
        $id_status = $id_status_map[$status] ?? null;
        if (!array_key_exists($status, $id_status_map)) {
            return abort(404);
        }
        $posts = $this->obj::where('id_status', '=', $id_status)->get();
        return view('admin.posts', [
            'posts' => $posts,
        ]);
    }
    public function approvePost($id_post)
    {
        try {
            $post = $this->obj::findOrFail($id_post);
            $post->update(['id_status' => '2']);
            Session::flash('success', 'Duyệt bài thành công');
            return back();
        } catch (\Throwable $e) {
            dd('hehe');
            Session::flash('error', $e);
            return back();
        }
    }
    public function rejectPost($id_post, Request $request)
    {
        // dd($request->reason);
        try {
            $post = $this->obj::findOrFail($id_post);
            $post->update(['id_status' => '0']);
            User::where('id', '=', $post->id_user)->update(['account_balance' => DB::raw('account_balance + 15000')]);
            Session::flash('success', 'Từ chối bài thành công');
            return back();
        } catch (\Throwable $e) {
            dd($e);
            Session::flash('error', $e);
            return back();
        }
    }
    public function getPost(Request $request)
    {
        $postId = $request->input('id');
        $post = $this->obj::with('images')->with('services')->with('ward')->with('district')->find($postId);
        if ($post) {
            return response()->json($post);
        } else {
            return response()->json(['error' => 'Post not found']);
        }
    }
}
