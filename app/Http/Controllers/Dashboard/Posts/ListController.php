<?php

namespace App\Http\Controllers\Dashboard\Posts;

// Model
use App\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Posts List
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        // 投稿されたブログの一覧を取得
        $post = new Post();
        $posts = $post::orderBy('id', 'desc')->get();

        // レスポンスデータ
        $res = [
            'posts' => $posts
        ];

        return view('dashboard.posts.list', $res);
    }
}
