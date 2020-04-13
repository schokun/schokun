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
Route::get('/category/{category}', 'CategoryController')->name('category.index');
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

        //user-stats
        Route::prefix('user')
            ->namespace('user')
            ->group(function () {
                Route::get('/stats', 'StatsController')->name('stats');
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
        Route::get('Dashboard/{any}', 'Api\Dashboard\HomeController@index')
            ->where('any', '.*')
            ->name('dashboard');
        Route::get('/admin', 'Api\Dashboard\UserController@index');
    });

//Админка
Route::middleware(['role:Админ'])
    ->group(function () {


        Route::get('/admin/feedBacks', 'FeedbackController@index');
        Route::get('/admin/feedBacks', 'FeedbackController@index');

        Route::resource('/admin/users', 'Api\Dashboard\UserController');
        Route::get('/admin/posts/users' , 'Api\Dashboard\UserController@getUsersForCreate');
        Route::resource('/admin/posts', 'Api\Dashboard\PostController');
        Route::resource('/admin/category', 'Api\Dashboard\CategoryController');



    });


