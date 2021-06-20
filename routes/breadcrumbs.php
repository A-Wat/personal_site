<?php
/*
    Front
*/
// top
Breadcrumbs::for('index', function ($trail) {
    $trail->push('トップ', route('index'));
});

/* Posts */
// list
Breadcrumbs::for('posts.list', function ($trail) {
    $trail->parent('index');
    $trail->push('記事一覧', route('posts.list'));
});

// index
Breadcrumbs::for('posts.index', function ($trail, $id, $title) {
    $trail->parent('posts.list');
    $trail->push($title, route('posts.index', ['id' => $id]));
});

/*
    Dashboard
*/
// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('ダッシュボード', route('dashboard.index'));
});

/* Posts */
// list
Breadcrumbs::for('dashboard.posts.list', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('ブログ一覧', route('dashboard.posts.list'));
});

// create / index
Breadcrumbs::for('dashboard.posts.create.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('ブログ新規投稿', route('dashboard.posts.create.index'));
});

// create / conf
Breadcrumbs::for('dashboard.posts.create.conf', function ($trail) {
    $trail->parent('dashboard.posts.create.index');
    $trail->push('内容確認', route('dashboard.posts.create.conf'));
}); 

// create / done
Breadcrumbs::for('dashboard.posts.create.done', function ($trail) {
    $trail->parent('dashboard.posts.create.conf');
    $trail->push('投稿完了', route('dashboard.posts.create.done'));
});

// edit / index
Breadcrumbs::for('dashboard.posts.edit.index', function ($trail, $id) {
    $trail->parent('dashboard');
    $trail->push('投稿編集', route('dashboard.posts.edit.index', ['id' => $id]));
});

/* Skills */
// list
Breadcrumbs::for('dashboard.skills.list', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('スキル一覧', route('dashboard.skills.list'));
});