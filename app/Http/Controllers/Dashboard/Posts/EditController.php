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
        $post_data = Post::find($id);

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

        // レスポンスデータ
        $res = [
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'eyecatch_path' => ''
        ];

        return view('dashboard.posts.edit.conf', $res);
    }

    public function done(PostRequest $req)
    {
        // 戻るボタンが押されたとき
        if($req->get('action') == 'back') {
            return redirect()->route('dashboard.posts.edit.index', ['id' => $req->id])->withInput();
            exit;
        }

        // 変更を保存
        Post::where('id', $req->id)
            ->update([
                'title' => $req->title,
                'content' => $req->content,
                'eyecatch' => ''
            ]);

        return view('dashboard.posts.edit.done');
    }
}
