<?php

namespace App\Http\Controllers\Dashboard\Posts;

// Model
use App\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class EditController extends Controller
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
     * Posts edit
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $req)
    {
        // 編集対象ID
        $id = $req->id;

        // 記事情報取得
        $post = new Post();
        $post_data = $post::find($id);

        // 対象の記事がない場合は、ブログ一覧にリダイレクト
        if(!$post_data) {
            return redirect()->route('dashboard.posts.list');
        }

        // レスポンスデータ
        $res = [
            'id' => $post_data->id,
            'title' => $post_data->title,
            'content' => $post_data->content,
            'eyecatch_path' => $post_data->eyecatch,
            'created_at' => $post_data->created_at,
            'updated_at' => $post_data->updated_at
        ];

        return view('dashboard.posts.edit.index', $res);
    }

    public function conf(PostRequest $req)
    {
        // 取得データ
        $id = $req->id;
        $title = $req->title;
        $content = $req->content;
        $eyecatch = $req->eyecatch;

        // 記事を更新してみる
        $post = new Post();
        $target = $post::find($id);
        $target->title = $title;
        $target->content = $content;
        $target->save();

        exit;
    }
}
