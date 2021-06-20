<?php

namespace App\Http\Controllers;

// Model
use App\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopController extends Controller
{
    /**
     * トップページ
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $req)
    {
        // ブログ記事一覧取得
        $post = new Post();
        $posts = $post::orderBy('id', 'desc')->get();

        // 

        // レスポンスデータ
        $res = [
            'heads' => [
                'page_title' => 'トップ',
                'description' => 'WEBシステムやWEBサイトの制作とか色々やってます！開発や個人学習での気づいたことなどをブログで掲載してます。WEBの世界で色んな事を実現していければそれが僕の仕事です！'
            ],
            'posts' => $posts
        ];

        return view('top', $res);
    }
}
