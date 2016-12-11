<?php

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

Route::get('/', ['uses' => 'UserController@index', 'as' => 'home']);

Route::resource('user', 'UserController');
Route::resource('product', 'ProductController');

Route::get('images/{type}/{id}/{image_name}', function($type=null,$id=null,$image_name = null) {
    $path = storage_path() . '/public/images/' . $type . '/' . $id . '/' . $image_name;
    if (file_exists($path)) {
        return Response::download($path);
    }
});

Route::resource('load/image/{type}/{id}', 'ImageController');

