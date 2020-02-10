<?php

include __DIR__.'/dynamic.php';

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

Route::domain(config('app.domain'))->group(function (){

    Route::middleware('cache.response:15')->group(function (){

        Route::namespace('Xml')->group(function (){
            Route::get('feed', 'RSSController@index');
            Route::get('rss', 'RSSController@index');

            Route::middleware('xml')->prefix('xml')->group(function () {
                Route::get('/xsl/sitemap.xsl', 'SitemapTemplateController@show');
                Route::get('sitemap-news.xml', 'GoogleNewsSitemapController@show');
            });
        });
    });
});
