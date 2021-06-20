<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
    Top
*/
Route::get('/', 'TopController@index')->name('index');

/*
    Posts
*/
// list
Route::get('/posts/list', 'Posts\ListController@index')->name('posts.list');

// 個別ページ
Route::get('/posts/{id}', 'Posts\IndexController@index')->name('posts.index');


/*
    Contact
*/
// conf
Route::post('/contact/conf', 'ContactController@conf')->name('contact.conf');

// done
Route::post('/contact/done', 'ContactController@done')->name('contact.done');

// 以下認証領域 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/dashboard', 'Dashboard\TopController@index')->name('dashboard.index');

/*
    Posts(Blog)
*/
// list
Route::get('/dashboard/posts/list', 'Dashboard\Posts\ListController@index')->name('dashboard.posts.list');

// create / index
Route::get('/dashboard/posts/create', 'Dashboard\Posts\CreateController@index')->name('dashboard.posts.create.index');

// create / conf
Route::post('/dashboard/posts/create/conf', 'Dashboard\Posts\CreateController@conf')->name('dashboard.posts.create.conf');

// create / done
Route::post('/dashboard/posts/create/done', 'Dashboard\Posts\CreateController@done')->name('dashboard.posts.create.done');

// edit / index
Route::get('/dashboard/posts/edit/{id}', 'Dashboard\Posts\EditController@index')->name('dashboard.posts.edit.index');

// edit / conf
Route::post('/dashboard/posts/edit/{id}/conf', 'Dashboard\Posts\EditController@conf')->name('dashboard.posts.edit.conf');

/*
    Skills
*/
// list
Route::get('/dashboard/skills/list', 'Dashboard\Skills\ListController@index')->name('dashboard.skills.list');

// create / index
Route::get('/dashboard/skills/create', 'Dashboard\Skills\CreateController@index')->name('dashboard.skills.create.index');

// create / conf
Route::post('/dashboard/skills/create/conf', 'Dashboard\Skills\CreateController@conf')->name('dashboard.skills.create.conf');