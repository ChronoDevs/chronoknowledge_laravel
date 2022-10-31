<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group(['namespace' => 'Api' ], function () {
    Route::post('login', 'UserController@login')->name('login');
    Route::post('register', 'UserController@register')->name('register');
    Route::post('password/email', 'UserController@sendResetLinkEmail');
    Route::post('password/reset', 'UserController@reset');

    Route::get('language', function () {
        return response()->json([
            'auth' => \Lang::get('auth'),
            'words' => \Lang::get('words'),
            'validation' => \Lang::get('validation')
        ], 200);
    });
});

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function(){
    // Route::get('test', function() {
    //     return response()->json(['1', '2', '3']);
    // });
});