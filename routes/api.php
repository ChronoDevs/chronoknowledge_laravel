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
    Route::get('login', 'UserController@login')->name('login');
    Route::post('register', 'UserController@register')->name('register');

    Route::get('language', function () {
        return response()->json([
            'auth' => \Lang::get('auth'),
            'words' => \Lang::get('words')
        ], 200);
    });
});

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function(){
    // Route::get('test', function() {
    //     return response()->json(['1', '2', '3']);
    // });
});