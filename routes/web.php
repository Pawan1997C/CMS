<?php

use App\Http\Controllers\Blog\PostsController;

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

Route::get('/', 'WelcomeController@index')->name('welcome.index');

Route::get('blog/{slug}', [PostsController::class, 'show'])->name('blog-post');

Route::get('blog/{category}/category', [PostsController::class, 'blog'])->name('blog.category');

Route::get('blog/{tag}/tag', [PostsController::class, 'tag'])->name('blog.tag');

Route::get('/results', function () {

    $post = \App\Post::where('title', 'LIKE', '%' . request('query') . '%')->get();

    return view('blog.search')
        ->with('title', request('query'))
        ->with('categories', \App\Category::take(5)->get())
        ->with('setting', \App\Settings::first())
        ->with('posts', $post);

});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories', 'CategoriesController');

    Route::resource('posts', 'PostsController');

    Route::resource('tags', 'TagsController');

    Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');

    Route::put('restore/{post}', 'PostsController@restore')->name('restore-posts');

    Route::get('users', 'UsersController@index')->name('users.index');

    Route::post('users/{user}/admin', 'UsersController@makeAdmin')->name('users.make-admin');

    Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit-profile');

    Route::put('users/{user}/update', 'UsersController@update')->name('users.update-profile');

    Route::Delete('users/{user}/delete', 'UsersController@destory')->name('users.delete-profile');

    Route::get('settings', ['uses' => 'SettingsController@index', 'as' => 'settings.index']);

    Route::post('settings/update', ['uses' => 'SettingsController@update', 'as' => 'settings.update']);

});
