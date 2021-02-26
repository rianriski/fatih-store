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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', 'API\ProductController@best');
Route::get('API/products/{condition}/condition', 'API\ProductController@condition');
Route::get('API/categories', 'API\CategoryController@index');
Route::get('API/detail/', 'API\DetailProductController@all');

Route::get('products', 'API\ProductController@all');
