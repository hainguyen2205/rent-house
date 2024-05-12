<?php

namespace App\Http\Services;

use App\Models\Image_Post;
use App\Models\Post;
use App\Models\User;
use App\Models\Service_Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class PostService
{
    public function insert($request)
    {
        try {
            $request->offsetUnset('_token');
            $request->merge(["id_user" => Auth::user()->id]);
            if (Auth::user()->account_balance < 15000) {
                Session::flash('error', 'Không đủ tiền');
                return;
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
            Session::flash('success', 'Đăng thành công');
        } catch (\Throwable $e) {
            Session::flash('error', 'Đã xảy ra lỗi khi đăng tin');
            return false;
        }
    }
    public function update($request)
    {
        if (!$request->has('id')) {
            Session::flash('error', 'Không tìm thấy id tin đăng');
            return;
        }
        $post = Post::findOrFail($request->id);
        if (!$post) {
            Session::flash('error', 'Không tìm thấy tin đăng');
            return;
        }

        $post_id = $post->id;
        $services = $request->services;
        $images = $request->images;
        $post_info = $request->except(['_token', 'id', 'images', 'services']);
        $updateData = [];
        foreach ($post_info as $key => $value) {
            if ($value !== null) {
                $updateData[$key] = $value;
            }
        }
        $updateData['id_status'] = 1;

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
            Session::flash('success', 'Cập nhật tin đăng thành công');
            return;
        } catch (\Throwable $e) {
            Session::flash('error', 'Đã xảy ra lỗi khi cập nhật tin');
            return;
        }
    }
}
