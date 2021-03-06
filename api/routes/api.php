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
Route::prefix('collection')->namespace('Collection')->group(function (){
    // api/collection/post/_search
    Route::match(['get', 'post', 'options'], 'post/_search', 'PostSearchController@index');
    Route::match(['get', 'post', 'options'],'post/{type}/_search', 'PostSearchController@show');
    Route::match(['get', 'post', 'options'],'category/_search', 'CategorySearchController@index');
    Route::match(['get', 'post', 'options'],'tag/_search', 'TagSearchController@index');
    Route::match(['get', 'post', 'options'], 'taxonomy/{type}/_search', 'TaxonomySearchController@show');
});
// pages/homepage
// api/collection

Route::middleware('cache.response')->group(function () {
    Route::get('options', 'OptionsController@index');

    Route::get('authors/{slug}', 'AuthorsController@show');
    Route::get('authors', 'AuthorsController@index');
    Route::get('menus/{locations}', 'MenusController@show');
});

Route::middleware('api.token')->group(function () {
    Route::get('draft/{id}', 'PreviewController@show')->where('id', '[0-9]+');
});
