<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use App\Models\District;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Ward;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public $service;

    public function __construct(PostService $postService)
    {
        $this->obj = new Post;
        $this->service = $postService;
    }
    public function createPost(PostRequest $request)
    {
        $this->service->insert($request);
        return redirect()->back();
    }
    public function displayPostList(Request $request)
    {
        $now = Carbon::now();
        $search_title = '';
        $this->addFilter('id_status', '=', '2');
        $this->setTitle('Danh sách bài đăng');
        $this->per_page = 8;

        //Set orderby
        if ($request->orderby == 'news') {
            $this->setOrderBy('created_at', 'desc');
        }
        if ($request->orderby == 'views') {
            $this->setOrderBy('views', 'desc');
        }
        if ($request->orderby == 'interests') {
            $this->setOrderBy('interests', 'desc');
        }

        //Set filters
        if ($request->title != '') {
            $search_title .= $request->title . '; ';
            $this->addFilter('title', 'like', '%' . $request->title . '%');
        }

        if ($request->id_district != '') {
            $this->addFilter('id_district', '=', $request->id_district);
            $search_title .= District::find($request->id_district)->district_name . '; ';
        }

        if ($request->id_ward != '') {
            $this->addFilter('id_ward', '=', $request->id_ward);
            $search_title .= Ward::find($request->id_ward)->ward_name . '; ';
        }

        if ($request->min_acreage != '' && $request->max_acreage != '') {
            $this->addFilter('acreage', 'between', [$request->min_acreage, $request->max_acreage]);
            $search_title .= 'Diện tích từ ' . $request->min_acreage . ' đến ' . $request->max_acreage . '; ';
        } elseif ($request->min_acreage != '') {
            $this->addFilter('acreage', '>=', $request->min_acreage);
            $search_title .= 'Diện tích từ ' . $request->min_acreage . ' trở lên; ';
        } elseif ($request->max_acreage != '') {
            $search_title .= 'Giá đến ' . $request->max_acreage . '; ';
            $this->addFilter('acreage', '<=', $request->max_acreage);
        }

        if ($request->min_rent != '' && $request->max_rent != '') {
            $this->addFilter('rent', 'between', [$request->min_rent, $request->max_rent]);
            $search_title .= 'Giá phòng từ ' . number_format($request->min_rent) . ' đến ' . number_format($request->max_rent) . '; ';
        } elseif ($request->min_rent != '') {
            $this->addFilter('rent', '>=', $request->min_rent);
            $search_title .= 'Giá phòng từ ' . number_format($request->min_rent) . ' trở lên; ';
        } elseif ($request->max_rent != '') {
            $search_title .= 'Giá phòng từ ' . number_format($request->max_rent) . '; ';
            $this->addFilter('rent', '<=', $request->max_rent);
        }

        return view('post.list', [
            'title' => $this->title,
            'search_title' => $search_title,
            'districts' => District::get(),
            'posts' => $this->obj->getAllData($this->filters, $this->orderBy, $this->per_page),
            'now' => $now,
        ]);
    }
    public function displayPostSingle($id_post)
    {
        $now = Carbon::now();
        $this->setTitle('Chi tiết bài đăng');
        $post = $this->obj->getSinglePost($id_post);

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

        return view('post.single', [
            'title' => $this->title,
            'post' => $post,
            'posts_of_author' => $posts_of_author,
            'related_address_posts' => $related_address_posts,
            'now' => $now,
        ]);
    }
    public function displayCreatePost()
    {
        $this->setTitle('Tạo bài đăng');
        $districts = new District();
        return view('post.create', [
            'title' => $this->title,
            'districts' => $districts->getAllData($this->filters, null, null),
        ]);
    }
}
