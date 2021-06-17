<?php

namespace App\Http\Controllers\Posts;

// Model
use App\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $req)
    {
        // 対象のidを取得
        $id = $req->id;

        // 存在する記事か確認
        $post = new Post();
        $post_data = $post::find($id);

        // 記事が存在しない場合は、トップへリダイレクト
        if(!$post_data) {
            return redirect()->route('index');
        }

        // レスポンスデータ
        $res = [
            'heads' => [
                'page_title' => $post_data->title,
                'description' => ''
            ],
            'id' => $post_data->id,
            'title' => $post_data->title,
            'content' => $post_data->content,
            'created_at' => $post_data->created_at,
            'updated_at' => $post_data->updated_at
        ];

        return view('posts.index', $res);
    }
}
