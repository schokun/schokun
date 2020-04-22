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


Route::get('/', 'PostController@index')->name('home');
Route::get('/post/{slug}', 'PostController@show')->name('post.show');
Route::get('/category/{category}', 'CategoryController')->name('category.home.index');
Route::post('/feedback', 'FeedbackController@store')->name('feedback.store');

Auth::routes();


//Роуты для авторизированых
Route::name('auth.')
    ->middleware('auth')
    ->group(function () {
        //user-post
        Route::prefix('user')
            ->namespace('user')
            ->group(function () {
                Route::resource('/post', 'PostController');
            });

        //user-settings
        Route::prefix('user')
            ->namespace('user')
            ->group(function () {
                Route::resource('/settings', 'settingsController', ['only' => [
                    'show', 'update'
                ]]);
            });


        //user-comments
        Route::prefix('post')
            ->group(function () {
                Route::resource('/comment', 'CommentsController', ['only' => [
                    'store', 'destroy'
                ]]);
            });

        //user-like
        Route::prefix('post')
            ->group(function () {
                Route::resource('/like', 'LikeController', ['only' => [
                    'store', 'destroy'
                ]]);
            });

    });


//Админка
Route::middleware(['role:Админ'])
    ->group(function () {
        Route::get('Dashboard/{any}', 'Dashboard\HomeController@index')
            ->where('any', '.*')
            ->name('dashboard');

        Route::get('/admin', 'Api\Dashboard\UserController@index');
        Route::get('/admin/feedBacks', 'FeedbackController@index');
        Route::get('/admin/feedBacks', 'FeedbackController@index');
        Route::resource('/admin/users', 'Dashboard\UserController');
        Route::get('/admin/posts/users' , 'Dashboard\UserController@getUsersForCreate');
        Route::resource('/admin/posts', 'Dashboard\PostController');
        Route::resource('/admin/category', 'Dashboard\CategoryController');
    });



