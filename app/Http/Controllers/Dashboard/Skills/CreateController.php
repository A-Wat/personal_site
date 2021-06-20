<?php

namespace App\Http\Controllers\Dashboard\Skills;

// Model
use App\Skill;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SkillRequest;

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
     * Skills List
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        // レスポンスデータ
        $res = [
        ];

        return view('dashboard.skills.create.index');
    }

    public function conf(SkillRequest $req)
    {
        // POSTされたデータを取得
        $name = $req->name;
        $image = $req->image;
        $image_path = '';
        $order = $req->order;

        if($image) {
            // imageを一時保存
            $filename = time()."_".$image->getClientOriginalName();
            $tmp_uploads_path = "images/uploads/tmp/skills/";
            $to_uploads = public_path($tmp_uploads_path);
            $image->move($to_uploads, $filename);

            // 保存先
            $image_path = $tmp_uploads_path.$filename;
        }

        // 入力内容を格納
        $inputs = $req->all();
        $inputs['image_path'] = $image_path;

        // レスポンスデータ
        $res = [
            "inputs" => $inputs
        ];

        return view('dashboard.skills.create.conf', $res);
    }
}
