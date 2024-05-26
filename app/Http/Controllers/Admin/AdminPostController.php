<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Mail\PostStatusNotify;
use App\Models\District;
use App\Models\Image_Post;
use App\Models\Post;
use App\Models\Reject_Post;
use App\Models\Service;
use App\Models\Service_Post;
use App\Models\TypeHouse;
use App\Models\User;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
        return view('admin.post.list', [
            'posts' => $posts,
            'id_status' => $id_status,
        ]);
    }
    public function displayCreatePost()
    {
        return view('admin.post.create', [
            'districts' => District::all(),
            'services' => Service::all(),
            'type_houses' => TypeHouse::all(),
        ]);
    }
    public function displayEditPost($id_post)
    {
        $post = $this->obj->findOrFail($id_post);
        $districts = District::get();
        $wards = Ward::where('id_district', $post->id_district)->get();
        $services = Service::get();
        if ($post->id_user != Auth::user()->id) {
            return abort(404);
        }
        return view('admin.post.edit', [
            'post' => $post,
            'districts' => $districts,
            'services' => $services,
            'type_houses' => TypeHouse::all(),
            'wards' => $wards
        ]);
    }
    public function createPost(PostRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->offsetUnset('_token');
            $request->merge(["id_user" => Auth::user()->id, 'id_status' => 2]);
            $post = Post::create($request->all());
            $post_id = $post->id;
            if ($request->input('services')) {
                foreach ($request->input('services') as $service) {
                    Service_Post::insert(["id_post" => $post_id, "id_service" => $service]);
                }
            }
            if ($request->input('images')) {
                foreach ($request->input('images') as $image) {
                    Image_Post::insert(["id_post" => $post_id, "url" => $image]);
                }
            }
            User::where('id', '=', Auth::user()->id)->update(['account_balance' => DB::raw('account_balance - 15000')]);
            DB::commit();
            Session::flash('success', 'Đăng thành công');
            return redirect('/admin/post/list/approved');
        } catch (\Throwable $e) {
            DB::rollBack();
            Session::flash('error', 'Đã xảy ra lỗi khi đăng tin' . $e->getMessage());
            return back();
        }
    }
    public function updatePost(PostRequest $request)
    {
        if (!$request->has('id')) {
            Session::flash('error', 'Không tìm thấy id tin đăng');
            return back();
        }
        $post = Post::findOrFail($request->id);
        if (!$post) {
            Session::flash('error', 'Không tìm thấy tin đăng');
            return back();
        }
        $post_id = $post->id;
        $services = $request->services;
        $images = $request->images;
        $post_info = $request->except(['_token', 'id', 'images', 'services']);
        $updateData = array_filter($post_info);

        DB::beginTransaction();

        try {
            if ($services) {
                Service_Post::where('id_post', $post_id)->delete();
                foreach ($services as $service) {
                    Service_Post::insert(['id_post' => $post_id, 'id_service' => $service]);
                }
            }
            if ($images) {
                Image_Post::where('id_post', $post_id)->delete();
                foreach ($images as $image) {
                    Image_Post::insert(["id_post" => $post_id, "url" => $image]);
                }
            }
            $post->update($updateData);
            DB::commit();
            Session::flash('success', 'Cập nhật tin đăng thành công');
        } catch (\Throwable $e) {
            DB::rollBack();
            Session::flash('error', 'Đã xảy ra lỗi khi cập nhật tin');
        }
        return back();
    }
    public function approvePost(Request $request)
    {
        $id_post = $request->input('id_post');
        DB::beginTransaction();
        try {
            $post = $this->obj::findOrFail($id_post);
            $post->update(['id_status' => '2']);
            Reject_Post::where('id_post', $post->id)->delete();
            DB::commit();
            Session::flash('success', 'Duyệt bài thành công');

            $user_mail = $post->author->email;
            Mail::to($user_mail)->send(new PostStatusNotify($post, 'approve'));
        } catch (\Throwable $e) {
            DB::rollBack();
            Session::flash('error', $e);
        }
        return back();
    }
    public function rejectPost(Request $request)
    {
        $id_post = $request->input('id_post');
        $reason =  $request->input('reason');
        if ($reason == '') {
            $reason = 'Vi phạm quy định';
        }
        DB::beginTransaction();
        try {
            $post = $this->obj::findOrFail($id_post);
            $post->update(['id_status' => '0']);
            User::where('id', '=', $post->id_user)->update(['account_balance' => DB::raw('account_balance + 15000')]);
            Reject_Post::insert(['id_post' => $post->id, 'reason' => $reason]);
            DB::commit();
            Session::flash('success', 'Từ chối bài thành công');
            $user_mail = $post->author->email;
            Mail::to($user_mail)->send(new PostStatusNotify($post, 'reject'));
        } catch (\Throwable $e) {
            DB::rollBack();
            Session::flash('error', $e);
        }
        return back();
    }
    public function deletePost(Request $request)
    {
        $post = Post::findOrFail($request->input('id_post'));
        if (!$post) {
            return back()->with('error', 'Không tìm tin đăng này');
        }
        $postSV = new PostService();
        $rs = $postSV->delete($post->id);
        if ($rs) {
            Session::flash('success', 'Đã xóa tin thành công');
        } else {
            Session::flash('error', 'Đã xảy ra lỗi khi xóa tin');
        }
        return back();
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
