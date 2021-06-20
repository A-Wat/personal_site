<?php

namespace App\Http\Controllers\Dashboard\Skills;

// Model
use App\Skill;

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
     * Skill List
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        // 登録されたスキル一覧を取得
        $skill = new Skill();
        $skills = $skill::orderBy('order', 'asc')->get();

        // レスポンスデータ
        $res = [
            'skills' => $skills
        ];

        return view('dashboard.skills.list', $res);
    }
}
