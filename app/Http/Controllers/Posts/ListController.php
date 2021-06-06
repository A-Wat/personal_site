<?php

namespace App\Http\Controllers\Posts;

// Model
use App\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListController extends Controller
{
    // 記事一覧
    public function index() {
        // 記事一覧を取得
        $post = new Post();
        $posts = $post::orderBy('updated_at', 'desc')->paginate(6);

        // レスポンスデータ
        $res = [
            'heads' => [
                'page_title' => '記事一覧',
                'description' => 'WEBシステムのフリーランスに関することや仕事や学習で得たプログラミングに関する知識をブログにして残していきます。後で自分で見返えしたり、同じようなことで悩んでいる方の参考になれば幸いです。'
            ],
            'posts' => $posts
        ];

        return view('posts.list', $res);
    }
}