<?php
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

Route::get('/test', function (){
//    return App\category::find(2)->posts;
//    return App\Post::find(3)->tags;
//    return App\User::find(1)->profile;
//    return dd($_SERVER);
});

Route::post('/subscribe', function (){
    $email = request('email');

    Newsletter::subscribe($email);
    Session::flash('subscribed', 'Successfully subscribed.');
    return redirect()->back();
});

Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/results', function (){
    $posts = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();
    $settings = \App\Setting::first();
    $categories = \App\Category::take(5)->get();

    return view('results', [
        'posts' => $posts,
        'title' => 'Search results: ' . request('query'),
        'settings' => $settings,
        'categories' => $categories,
        'query' => request('query')
    ]);
});

Route::get('/post/{slug}',[
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{slug}',[
    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{Slug}',[
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){

    Route::get('/dashboard', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    /** POSTS */

    Route::get('/post/create', [
        'uses' => 'PostController@create',
        'as' => 'post.create'
    ]);

    Route::post('/post/store', [
        'uses' => 'PostController@store',
        'as' => 'post.store'
    ]);

    Route::get('/posts', [
        'uses' => 'PostController@index',
        'as' => 'posts'
    ]);

    Route::get('/trashed', [
        'uses' => 'PostController@trashed',
        'as' => 'posts.trashed'
    ]);

    Route::get('/post/kill/{id}', [
        'uses' => 'PostController@kill',
        'as' => 'post.kill'
    ]);

    Route::get('/post/restore/{id}', [
        'uses' => 'PostController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('/post/edit/{id}', [
        'uses' => 'PostController@edit',
        'as' => 'post.edit'
    ]);

    Route::get('/post/delete/{id}', [
        'uses' => 'PostController@destroy',
        'as' => 'post.delete'
    ]);

    Route::post('/post/update/{id}', [
        'uses' => 'PostController@update',
        'as' => 'post.update'
    ]);

    /** CATEGORIES */

    Route::get('/category/create', [
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
    ]);

    Route::post('/category/store', [
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
    ]);

    Route::get('/categories', [
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);

    Route::get('/category/edit/{id}', [
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    Route::get('/category/delete/{id}', [
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);

    Route::post('/category/update/{id}', [
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);

    /** TAGS */

    Route::get('/tag/create', [
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
    ]);

    Route::post('/tag/store', [
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
    ]);

    Route::get('/tags', [
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);

    Route::get('/tag/edit/{id}', [
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);

    Route::post('/tag/update/{id}', [
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);

    /** USERS */

    Route::get('/users', [
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('/user/create', [
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('/user/store', [
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);

    Route::get('/user/admin/{id}', [
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);

    Route::get('/user/not-admin/{id}', [
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'
    ]);

    Route::get('/user/profile', [
        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::post('/user/profile/update', [
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);

    Route::get('/user/delete/{id}', [
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    Route::get('/settings', [
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);

    Route::post('/settings/update', [
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);

});

