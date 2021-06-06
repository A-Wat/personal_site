<?php

namespace App\Http\Controllers\Dashboard\Posts;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class CreateController extends Controller
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
     * Posts create
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $req)
    {
        // 関連セッションデータがある場合
        $title = (session()->get('title')) ? session()->get('title') : '';
        $content = (session()->get('content')) ? session()->get('content') : '';
        $eyecatch = (session()->get('eyecatch')) ? session()->get('eyecatch') : '';

        // 関連セッションを破棄
        session()->forget('title');
        session()->forget('content');
        session()->forget('eyecatch');

        // レスポンスデータ
        $res = [
            "title" => $title,
            "content" => $content,
            "eyecatch" => $eyecatch
        ];

        return view('dashboard.posts.create.index', $res);
    }

    public function conf(PostRequest $req)
    {
        // POSTされたデータを取得
        $title = $req->title;
        $content = $req->content;
        $eyecatch = $req->eyecatch;
        $eyecatch_path = '';

        if($eyecatch) {
            // eyecatchを一時保存
            $filename = time()."_".$eyecatch->getClientOriginalName();
            $tmp_uploads_path = 'images/uploads/tmp/';
            $to_uploads = public_path($tmp_uploads_path);
            $eyecatch->move($to_uploads, $filename);

            // eyeactchの保存先
            $eyecatch_path = $tmp_uploads_path.$filename;
        }

        // セッションに格納
        $req->session()->put('title', $title);
        $req->session()->put('content', $content);
        $req->session()->put('eyecatch_path', $eyecatch_path);

        // レスポンスデータ
        $res = [
            "title" => $title,
            "content" => $content,
            "eyecatch_path" => $eyecatch_path
        ];

        return view('dashboard.posts.create.conf', $res);
    }

    public function done(Request $req)
    {
        // 関連セッションを取得
        $title = session()->get('title');
        $content = session()->get('content');
        $eyecatch = session()->get('eyecatch_path');

        // postsに保存
        $post = new Post();
        $post->fill([
            'title' => $title,
            'content' => $content,
            'eyecatch' => $eyecatch,
        ]);
        $post->save();

        // 関連セッションを削除
        session()->forget('title');
        session()->forget('content');
        session()->forget('eyecatch_path');

        return view('dashboard.posts.create.done');
    }

}
