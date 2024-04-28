<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Services\PostService;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $post;
    public function __construct(PostService $postService)
    {

        $this->post = $postService;
    }
    public function createPost(PostRequest $request)
    {
        $this->post->insert($request);
        return redirect()->back();
    }
    public function displayPostList()
    {
        $this->setTitle('Danh sách bài đăng');
        $districts = new AddressController();
        $posts = Post::paginate(6);
        return view('post.list', [
            'title' => $this->title,
            'districts' => $districts->getAllDistrict(),
            'posts' => $posts,
        ]);
    }
    public function displayPostSingle($id_post)
    {
        $this->setTitle('Chi tiết bài đăng');
        $post = Post::findOrFail($id_post);
        $posts_of_author = Post::where('id_user','=',$post->id_user)->where('id', '<>', $post->id)->get();
        $related_address_posts = Post::where('id_district', '=', $post->id_district)->where('id_ward', '=', $post->id_ward)->where('id_status', '=', '2')->where('id', '<>', $post->id)->paginate(5);
        if (count($related_address_posts) < 2) {
            $related_address_posts = Post::where('id_district', '=', $post->id_district)->where('id_status', '=', '2')->where('id', '<>', $post->id)->paginate(5);
        }
        return view('post.single', [
            'title' => $this->title,
            'post' => $post,
            'posts_of_author' => $posts_of_author,
            'related_address_posts' => $related_address_posts
        ]);
    }
    public function displayCreatePost()
    {
        $this->setTitle('Tạo bài đăng');
        $districts = new AddressController();
        return view('post.create', [
            'title' => $this->title,
            'districts' => $districts->getAllDistrict(),
        ]);
    }
}
