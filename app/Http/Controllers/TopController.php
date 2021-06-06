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
        // データ定義
        $name = '';
        $email = '';
        $inquiry = '';

        if(
            session()->has('name') ||
            session()->has('email') ||
            session()->has('inquiry')
        ) {
            // セッションデータをレスポンス用変数に代入
            $name = session()->get('name');
            $email = session()->get('email');
            $inquiry = session()->get('inquiry');

            // セッションを破棄
            session()->forget('name');
            session()->forget('email');
            session()->forget('inquiry');
        }

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
            'name' => $name,
            'email' => $email,
            'inquiry' => $inquiry,
            'posts' => $posts
        ];

        return view('top', $res);
    }
}
