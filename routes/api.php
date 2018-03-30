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

/*Route::prefix('v1')->group(function(){
    Route::get('/products', 'ProductsController@index');
    Route::post('/products', 'ProductsController@store');
    Route::put('/products/{product}', 'ProductsController@update');
    Route::get('/products/{product}', 'ProductsController@show');
    Route::delete('/products/{product}', 'ProductsController@destroy');
});*/

Route::middleware('auth:api')->prefix('v1')->group(function(){

    Route::get('/users/me', function(){
        return request()->user();
    });

    Route::resources([
        'products' => 'ProductsController',
        'services' => 'ServicesController'
        ]);
});

Route::get('cors_example', function () {
    return redirect('http://127.0.0.1:8000/');
})->middleware('cors');