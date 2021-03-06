<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->api($request->user());
})->name('api.user');

Route::post('login', 'Api\Auth\LoginController')
	->name('api.login');

Route::post('logout', 'Api\Auth\LogoutController')
	->middleware('auth:api')
	->name('api.logout');

Route::post('register', 'Api\Auth\RegisterController')
	->name('api.register');

