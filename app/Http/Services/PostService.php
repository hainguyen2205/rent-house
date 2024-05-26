<?php

namespace App\Http\Services;

use App\Models\Image_Post;
use App\Models\Post;
use App\Models\Post_Interest;
use App\Models\Reject_Post;
use App\Models\User;
use App\Models\Service_Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class PostService
{
    public function insert($request)
    {
        DB::beginTransaction();
        try {
            $request->offsetUnset('_token');
            $request->merge(["id_user" => Auth::user()->id]);
            if (Auth::user()->account_balance < 15000) {
                Session::flash('error', 'Không đủ tiền');
                return null;
            }
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
            return $post;
        } catch (\Throwable $e) {
            DB::rollBack();
            Session::flash('error', 'Đã xảy ra lỗi khi đăng tin');
            dd($e);
            return null;
        }
    }
    public function update($request)
    {
        if (!$request->has('id')) {
            Session::flash('error', 'Không tìm thấy id tin đăng');
            return false;
        }
        $post = Post::findOrFail($request->id);
        if (!$post) {
            Session::flash('error', 'Không tìm thấy tin đăng');
            return false;
        }
        // dd($post->updated_count);
        if ($post->updated_count >= 1) {
            Session::flash('error', 'Bài đăng đã quá số lần chỉnh sửa');
            return false;
        }

        $post_id = $post->id;
        $services = $request->services;
        $images = $request->images;
        $post_info = $request->except(['_token', 'id', 'images', 'services']);
        $updateData = array_filter($post_info);
        $updateData['id_status'] = 1;

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
            $post->increment('updated_count');
            DB::commit();
            Session::flash('success', 'Cập nhật tin đăng thành công');
            return true;
        } catch (\Throwable $e) {
            DB::rollBack();
            Session::flash('error', 'Đã xảy ra lỗi khi cập nhật tin');
            return false;
        }
    }
    public function delete($post_id)
    {
        try {
            DB::beginTransaction();

            $post = Post::findOrFail($post_id);

            Service_Post::where('id_post', $post->id)->delete();
            Image_Post::where('id_post', $post->id)->delete();
            Post_Interest::where('id_post', $post->id)->delete();
            Reject_Post::where('id_post', $post->id)->delete();
            $post->delete();
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
    }
}
