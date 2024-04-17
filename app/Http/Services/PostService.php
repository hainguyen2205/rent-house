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
            DB::select('update users set account_balance = account_balance - 15000 where id = ' . Auth::user()->id);
            Session::flash('success', 'Đăng thành công');
        } catch (\Throwable $e) {
            Session::flash('error', 'Lỗi' . $e);
            return false;
        }
    }
}
