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
    return $request->user();
});
Route::get('/open', 'CategoryController@open');
Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::group(['middleware' => ['jwt.verify']], function() {
        Route::get('user', 'UserController@getAuthenticatedUser');
        Route::get('/categories', 'CategoryController@show');
        Route::post('/categories', 'CategoryController@store');
        Route::put('/categories/{id}', 'CategoryController@update');
        Route::delete('/categories/{id}', 'CategoryController@destroy');
        Route::get('/products', 'ProductController@show');
        Route::post('/products', 'ProductController@store');
        Route::put('/products/{id}', 'ProductController@update');
        Route::delete('/products/{id}', 'ProductController@destroy');
    });







