<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Models\District;
use App\Models\Post_Interest;
use App\Models\TypeHouse;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Service;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    protected $service;

    public function __construct(PostService $postService)
    {
        $this->obj = new Post;
        $this->service = $postService;
    }
    public function createPost(PostRequest $request)
    {
        if($this->service->insert($request)) {
            return redirect('/profile/post/pending');
        };
        return redirect()->back();
    }
    public function updatePost(PostRequest $request)
    {
        if($this->service->update($request)){
           return redirect('/profile/post/pending'); 
        }
        return back();
    }
    public function deletePost($id_post)
    {
        $post = Post::findOrFail($id_post);
        if (!$post) {
            Session::flash('error', 'Không tìm thấy tin đăng');
            return back();
        }
        if ($post->id_user != Auth::user()->id) {
            return abort(404);
        }
        try {
            $post->update(['id_status' => '3']);
            Session::flash('success', 'Xóa tin đăng thành công');
        } catch (\Throwable $th) {
            Session::flash('error', 'Đã xảy ra lỗi khi xóa tin đăng');
        }
        return back();
    }
    public function displayEditForm($id_post)
    {
        $post = $this->obj->findOrFail($id_post);
        $districts = District::get();
        $wards = Ward::where('id_district', $post->id_district)->get();
        $services = Service::get();
        if ($post->id_user != Auth::user()->id) {
            return abort(404);
        }
        $this->setTitle('Chỉnh sửa bài đăng');
        return view('post.edit', [
            'post' => $post,
            'title' => $this->title,
            'districts' => $districts,
            'wards' => $wards,
            'services' => $services,
            'type_houses' => TypeHouse::all(),
        ]);
    }
    public function displayPostList(Request $request)
    {
        $now = Carbon::now();
        $search_title = '';
        $this->addFilter('id_status', '=', '2');
        $this->setTitle('Danh sách bài đăng');
        $this->per_page = 12;

        //Set orderby
        $orderByOptions = ['news' => 'created_at', 'views' => 'views', 'interests' => 'interests'];
        if (isset($orderByOptions[$request->orderby])) {
            $this->setOrderBy($orderByOptions[$request->orderby], 'desc');
        }

        //Set filters
        $filter_title = trim($request->title);
        if (!empty($filter_title)) {
            $search_title .= $filter_title . '; ';
            $this->addFilter('title', 'like', '%' . $filter_title . '%');
        }

        $filter_district = trim($request->id_district);
        if (!empty($filter_district)) {
            $district = District::find($filter_district);
            if ($district) {
                $this->addFilter('id_district', '=', $filter_district);
                $search_title .= $district->district_name . '; ';
            } else {
                abort(404);
            }
        }

        $filter_type_house = $request->type_house;
        if (!empty($filter_type_house)) {
            $type = TypeHouse::find($filter_type_house);
            if ($type) {
                $this->addFilter('type_house', '=', $filter_type_house);
                $search_title .= $type->type_name . '; ';
            } else {
                abort(404);
            }
        }

        $filter_ward = $request->id_ward;
        if (!empty($filter_ward)) {
            $ward = Ward::find($filter_ward);
            if ($ward) {
                $this->addFilter('id_ward', '=', $filter_ward);
                $search_title .= $ward->ward_name . '; ';
            } else {
                abort(404);
            }
        }

        $filter_min_acreage = $request->min_acreage;
        $filter_max_acreage = $request->max_acreage;
        if (is_numeric($filter_min_acreage) && is_numeric($filter_max_acreage)) {
            $this->addFilter('acreage', 'between', [$filter_min_acreage, $filter_max_acreage]);
            $search_title .= 'Diện tích từ ' . $filter_min_acreage . ' đến ' . $filter_max_acreage . 'm2; ';
        } elseif (is_numeric($filter_min_acreage)) {
            $this->addFilter('acreage', '>=', $filter_min_acreage);
            $search_title .= 'Diện tích từ ' . $filter_min_acreage . 'm2 trở lên; ';
        } elseif (is_numeric($filter_max_acreage)) {
            $search_title .= 'Giá đến ' . $filter_max_acreage . 'm2; ';
            $this->addFilter('acreage', '<=', $filter_max_acreage);
        }

        $filter_min_rent = $request->min_rent;
        $filter_max_rent = $request->max_rent;
        if (is_numeric($filter_min_rent) && is_numeric($filter_max_rent)) {
            $this->addFilter('rent', 'between', [$filter_min_rent, $filter_max_rent]);
            $search_title .= 'Giá phòng từ ' . number_format($filter_min_rent) . ' đến ' . number_format($filter_max_rent) . 'đ; ';
        } elseif (is_numeric($filter_min_rent)) {
            $this->addFilter('rent', '>=', $filter_min_rent);
            $search_title .= 'Giá phòng từ ' . number_format($filter_min_rent) . 'đ trở lên; ';
        } elseif (is_numeric($filter_max_rent)) {
            $search_title .= 'Giá phòng từ ' . number_format($filter_max_rent) . 'đ ';
            $this->addFilter('rent', '<=', $filter_max_rent);
        }

        return view('post.list', [
            'title' => $this->title,
            'search_title' => $search_title,
            'districts' => District::all(),
            'type_houses' => TypeHouse::all(),
            'posts' => $this->obj->getAllData($this->filters, $this->orderBy, $this->per_page),
            'now' => $now,
        ]);
    }
    public function updateView($id_post)
    {
        $this->obj::where('id', $id_post)->update(['views' => DB::raw('views + 1')]);
    }
    public function interestPost($id_post)
    {
        $post = $this->obj->findOrFail($id_post);
        if (!$post) {
            Session::flash('error', 'Đã xảy ra lỗi');
            return back();
        }
        $was_interested = Post_Interest::where('id_user', Auth::user()->id)->where('id_post', $post->id)->count();
        if ($was_interested != 0) {
            Session::flash('error', 'Đã quan tâm');
            return back();
        }
        try {
            Post_Interest::create(['id_user' => Auth::user()->id, 'id_post' => $post->id]);
            Session::flash('success', 'Đã quan tâm bài viết này!');
        } catch (\Throwable $e) {
            Session::flash('error', 'Đã xảy ra lỗi ' . $e);
        }
        return back();
    }
    public function displayPostSingle($id_post)
    {
        $now = Carbon::now();
        $this->setTitle('Chi tiết bài đăng');
        $post = $this->obj->findOrFail($id_post);
        $was_interested = Post_Interest::where('id_user', Auth::user()->id)->where('id_post', $post->id)->count();
        $user_interested_list = Post_Interest::where('id_post', $post->id)->get();

        $this->updateView($post->id);
        $this->addFilter('id_status', '=', '2');
        $this->addFilter('id', '<>', $post->id);
        $this->addFilter('id_user', '=', $post->id_user);
        $posts_of_author = $this->obj->getAllData($this->filters, null, null);
        $this->removeFilter('id_user', '=', $post->id_user);

        $this->addFilter('id_district', '=', $post->id_district);
        $this->addFilter('id_ward', '=', $post->id_ward);
        $related_address_posts = $this->obj->getAllData($this->filters, null, 6);
        if (count($related_address_posts) < 3) {
            $this->removeFilter('id_ward', '=', $post->id_ward);
            $related_address_posts = $this->obj->getAllData($this->filters, null, 6);
        }

        if (count($related_address_posts) < 3) {
            $related_address_posts = $this->obj->paginate(6);
        }

        return view('post.single', [
            'title' => $this->title,
            'post' => $post,
            'posts_of_author' => $posts_of_author,
            'related_address_posts' => $related_address_posts,
            'was_interested' => $was_interested,
            'user_interested_list' => $user_interested_list,
            'now' => $now,
        ]);
    }
    public function displayCreatePost()
    {
        $this->setTitle('Tạo bài đăng');
        $districts = District::all();
        $type_houses = TypeHouse::all();
        $services = Service::all();
        return view('post.create', [
            'title' => $this->title,
            'districts' => $districts,
            'type_houses' => $type_houses,
            'services' => $services,
        ]);
    }
}
