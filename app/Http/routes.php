<?php

// use App\Repository\User\UserRepositoryInterface;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('user', function(UserRepositoryInterface $user) {
//     return $user->getUsers();
// });
// Route::get('user/{id}',function ($id,UserRepositoryInterface $user)
// {
// 	return $user->findUser($id);
// });

Route::group(['prefix'=>'admin','middleware'=>'auth'],function ()
{
	Route::resource('user','UserController');
	Route::resource('post','PostController');
	Route::resource('role','RoleController');
});

// https://laravel.com/docs/5.4/migrations
Route::auth();

Route::get('/home', 'HomeController@index');
